<template>
  <!-- Sidebar -->
  <SideBar />

  <div class="community-container">
    <!-- Conteúdo principal -->
    <main class="main-content">
      <!-- Header da Comunidade -->
      <header class="community-header"></header>

      <div class="logo-container">
        <img
          src="/images/community-logo.png"
          alt="Comunidade"
          class="community-logo"
        />
        <div class="community-info">
          <h1>{{ course.name }}</h1>
          <p>{{ course.description }}</p>
        </div>
        <div class="actions">
          <button
            class="subscribe"
            :disabled="loading || isEnrolled"
            @click="isEnrolled ? unenroll(course.id) : enroll(course.id)"
          >
            {{
              isEnrolled
                ? 'Inscrito'
                : loading
                  ? 'Inscrevendo...'
                  : 'Inscreva-se'
            }}
          </button>
          <!-- Botão para mostrar/esconder o formulário de post -->
          <button class="post" @click="togglePostForm">+ Postar</button>
        </div>
      </div>

      <!-- Formulário de criação/edição de post -->
      <div v-if="showPostForm" class="post-form">
        <h2>{{ editingPost ? 'Editar Post' : 'Novo Post' }}</h2>
        <input
          type="text"
          v-model="newPost.title"
          placeholder="Título do post"
          required
        />
        <textarea
          v-model="newPost.content"
          placeholder="Conteúdo do post"
          required
        ></textarea>
        <div class="form-actions">
          <button v-if="editingPost" @click="updatePost">Atualizar Post</button>
          <button v-else @click="createPost">Criar Post</button>
          <button @click="cancelPost">Cancelar</button>
        </div>
      </div>

      <!-- Lista de Postagens -->
      <section class="posts">
        <article v-for="(post, index) in posts" :key="post.id" class="post">
          <div class="post-header">
            <img :src="post.userAvatar" alt="Avatar" class="avatar" />
            <div>
              <span class="username">{{ post.username }}</span>
              <span class="timestamp">• {{ post.timestamp }}</span>
            </div>
          </div>
          <h2 class="post-title">{{ post.title }}</h2>
          <p class="post-content">{{ post.content }}</p>
          <div class="post-footer">
            <button class="comment-btn">💬 {{ post.comments }}</button>
          </div>
          <!-- Se o post pertencer ao usuário autenticado, mostra as ações -->
          <div
            v-if="authUser && post.user_id === authUser.id"
            class="post-actions"
          >
            <button @click="editPost(post, index)">Editar</button>
            <button @click="deletePost(post.id, index)">Excluir</button>
          </div>
        </article>
      </section>
    </main>
  </div>
</template>

<script>
import SideBar from '../Components/SideBar.vue';

export default {
  props: {
    course: {
      type: Object,
      required: true,
    },
    authUser: {
      type: Object,
      required: true,
    },
  },
  components: {
    SideBar,
  },
  data() {
    return {
      // Se o backend enviar os posts dentro de course.posts, você pode usar isso;
      // Caso contrário, mantenha uma lista estática (ou inicialize como array vazio).
      posts: this.course.posts
        ? this.course.posts
        : [
            // Exemplo estático (remova se for usar os dados do backend)
            {
              id: 1,
              user_id: 1,
              userAvatar: '/images/user1.png',
              username: 'user1',
              title: 'Como estudar programação?',
              content:
                'Como vocês estudam? Ainda mais uma linguagem diferente? Digo, não só copiar o código, mas realmente aprender sobre?',
              timestamp: 'há 7h',
              comments: 0,
            },
            {
              id: 2,
              user_id: 2,
              userAvatar: '/images/user2.png',
              username: 'user2',
              title: 'Botão não redireciona e baixa arquivo',
              content:
                'Criamos uma página de HTML para cadastro, mas há um botão que baixa o arquivo ao invés de redirecionar. Como corrigir?',
              timestamp: 'há 1 dia',
              comments: 0,
            },
          ],
      loading: false,
      isEnrolled: false,
      showPostForm: false,
      // newPost armazena os dados do post a criar ou editar
      newPost: {
        title: '',
        content: '',
      },
      // editingPost guarda o post que está sendo editado (ou null se for criação)
      editingPost: null,
    };
  },
  methods: {
    async checkEnrollment() {
      try {
        const response = await fetch(`/courses/${this.course.id}/is-enrolled`);
        const data = await response.json();
        this.isEnrolled = data.enrolled;
      } catch (error) {
        console.error('Erro ao verificar inscrição:', error);
      }
    },

    async enroll(courseId) {
      if (this.loading || this.isEnrolled) return;
      this.loading = true;

      try {
        const response = await fetch(`/courses/${courseId}/enroll`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
              .content,
          },
        });

        const responseData = await response.json();

        if (response.ok) {
          this.showNotification(
            'success',
            responseData.success || 'Inscrição realizada com sucesso!'
          );
          this.isEnrolled = true;
        } else {
          this.showNotification(
            'warning',
            responseData.error || 'Você já está inscrito neste curso.'
          );
        }
      } catch (error) {
        this.showNotification(
          'error',
          error.message || 'Erro inesperado ao tentar se inscrever.'
        );
        console.error('Erro ao se inscrever:', error);
      } finally {
        this.loading = false;
      }
    },

    async unenroll(courseId) {
      if (this.loading) return;
      this.loading = true;

      try {
        const response = await fetch(`/courses/${courseId}/unenroll`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
              .content,
          },
        });

        const responseData = await response.json();

        if (response.ok) {
          this.showNotification(
            'success',
            responseData.success || 'Desinscrição realizada com sucesso!'
          );
          this.isEnrolled = false;
        } else {
          this.showNotification(
            'warning',
            responseData.error || 'Erro ao desinscrever.'
          );
        }
      } catch (error) {
        this.showNotification(
          'error',
          error.message || 'Erro inesperado ao tentar desinscrever.'
        );
        console.error('Erro ao desinscrever:', error);
      } finally {
        this.loading = false;
      }
    },

    showNotification(type, message) {
      if (this.$toast && typeof this.$toast[type] === 'function') {
        this.$toast[type](message);
      } else {
        alert(message);
      }
    },

    // Alterna a exibição do formulário de post
    togglePostForm() {
      // Se estiver editando, cancela a edição
      if (this.editingPost) {
        this.cancelPost();
      } else {
        this.showPostForm = !this.showPostForm;
        // Limpa o formulário se estiver abrindo para novo post
        if (this.showPostForm === true) {
          this.newPost = { title: '', content: '' };
        }
      }
    },

    cancelPost() {
      this.showPostForm = false;
      this.newPost = { title: '', content: '' };
      this.editingPost = null;
    },

    // Cria um novo post e atualiza a lista local
    async createPost() {
      try {
        const response = await fetch(`/community/${this.course.id}/posts`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
              .content,
          },
          body: JSON.stringify(this.newPost),
        });
        if (!response.ok) {
          const data = await response.json();
          this.showNotification('error', data.error || 'Erro ao criar post.');
          return;
        }
        const data = await response.json();
        // Adiciona o novo post na lista local
        this.posts.push({
          id: data.id,
          user_id: data.user_id,
          userAvatar:
            this.authUser.profile_photo || '/images/default-avatar.png',
          username: data.user_name,
          title: data.title,
          content: data.content,
          timestamp: 'Agora',
          comments: 0,
        });
        this.showNotification('success', 'Post criado com sucesso!');
        this.cancelPost();
      } catch (error) {
        console.error('Erro ao criar post:', error);
        this.showNotification('error', 'Erro ao criar post.');
      }
    },

    // Inicia a edição de um post: preenche o formulário e salva o índice
    editPost(post, index) {
      this.editingPost = { ...post, index };
      this.newPost = { title: post.title, content: post.content };
      this.showPostForm = true;
    },

    // Atualiza o post e modifica a lista local
    async updatePost() {
      try {
        const response = await fetch(
          `/community/${this.course.id}/posts/${this.editingPost.id}`,
          {
            method: 'PUT',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                .content,
            },
            body: JSON.stringify(this.newPost),
          }
        );
        if (!response.ok) {
          const data = await response.json();
          this.showNotification(
            'error',
            data.error || 'Erro ao atualizar post.'
          );
          return;
        }
        const data = await response.json();
        // Atualiza o post na lista usando o índice salvo
        this.posts[this.editingPost.index].title = data.title;
        this.posts[this.editingPost.index].content = data.content;
        this.showNotification('success', 'Post atualizado com sucesso!');
        this.cancelPost();
      } catch (error) {
        console.error('Erro ao atualizar post:', error);
        this.showNotification('error', 'Erro ao atualizar post.');
      }
    },

    // Deleta o post e remove-o da lista local
    async deletePost(postId, index) {
      try {
        const response = await fetch(
          `/community/${this.course.id}/posts/${postId}`,
          {
            method: 'DELETE',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                .content,
            },
          }
        );
        if (!response.ok) {
          const data = await response.json();
          this.showNotification('error', data.error || 'Erro ao excluir post.');
          return;
        }
        this.posts.splice(index, 1);
        this.showNotification('success', 'Post excluído com sucesso!');
      } catch (error) {
        console.error('Erro ao excluir post:', error);
        this.showNotification('error', 'Erro ao excluir post.');
      }
    },
  },
  mounted() {
    this.checkEnrollment();
  },
};
</script>

<style scoped>
.community-container {
  padding: 40px;
  color: #000;
  max-width: 80%;
  margin: auto;
  font-family: 'Montserrat', sans-serif;
}

.community-header {
  background: linear-gradient(to right, #ffffff, #9fd7d7);
  padding: 8%;
  border-radius: 10px;
}

.logo-container {
  display: flex;
  align-items: center;
  gap: 30px;
  justify-content: space-between;
  margin-top: 20px;
}

.community-info {
  display: flex;
  flex-direction: column;
}

.community-info h1 {
  font-size: 30px;
  font-weight: bold;
}

.actions button {
  margin-top: 10px;
  padding: 10px 15px;
  border: none;
  border-radius: 10px;
  margin: 10px 5px;
  font-size: 14px;
  color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: background 0.3s;
}

/* Botão Inscreva-se/Inscrito */
.actions button.subscribe {
  background: #135572;
}

.actions button.subscribe:hover:not(:disabled) {
  background: #0e3d53;
}

.actions button.subscribe:disabled {
  background: #b3b3b3;
  cursor: not-allowed;
}

/* Botão Postar */
.actions button.post {
  background: #135572;
}

.actions button.post:hover {
  background: #0e3d53;
}

/* Estilo para o formulário de post */
.post-form {
  margin: 20px 0;
  padding: 15px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.post-form input,
.post-form textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-actions button {
  margin-right: 10px;
  padding: 8px 12px;
  border: none;
  border-radius: 4px;
  background: #135572;
  color: #fff;
  cursor: pointer;
  transition: background 0.3s;
}

.form-actions button:hover {
  background: #0e3d53;
}

/* Lista de posts */
.post {
  border-bottom: 1px solid #000;
  padding: 35px 0;
  margin-top: 30px;
}

.post-header {
  display: flex;
  gap: 10px;
  font-size: 14px;
  font-weight: bold;
  color: #000;
}

.avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
}

.username {
  font-weight: bold;
  font-size: 14px;
  color: #000;
  margin-right: 15px;
}

.timestamp {
  font-size: 14px;
  color: #888;
}

.post-title {
  font-size: 15px;
  font-weight: bold;
  margin-top: 5px;
}

.post-content {
  font-size: 12px;
  color: #444;
  margin-bottom: 10px;
}

.post-footer {
  display: flex;
  align-items: center;
  gap: 5px;
}

.comment-btn {
  display: flex;
  align-items: center;
  background: #d9d9d9;
  color: #333;
  cursor: pointer;
  font-size: 14px;
  padding: 5px 10px;
  border-radius: 5px;
}

/* Ações de edição e exclusão no post */
.post-actions {
  margin-top: 10px;
}

.post-actions button {
  margin-right: 10px;
  padding: 5px 10px;
  border: none;
  border-radius: 4px;
  background: #135572;
  color: #fff;
  cursor: pointer;
  transition: background 0.3s;
}

.post-actions button:hover {
  background: #0e3d53;
}
</style>
