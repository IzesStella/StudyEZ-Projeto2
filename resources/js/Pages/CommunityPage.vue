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
          <!-- Botão de Inscrever (alterado) -->
          <button
            v-if="!isEnrolled"
            class="subscribe"
            :disabled="loading"
            @click="enroll(course.id)"
          >
            {{ loading ? 'Inscrevendo...' : 'Inscreva-se' }}
          </button>

          <!-- Botão de Desinscrever (novo) -->
          <button
            v-else
            class="unsubscribe"
            :disabled="loading"
            @click="unenroll(course.id)"
          >
            {{ loading ? 'Desinscrevendo...' : 'Desinscrever-se' }}
          </button>
          <button class="post">+ Postar</button>
        </div>
      </div>

      <!-- Lista de Postagens -->
      <section class="posts">
        <article v-for="post in posts" :key="post.id" class="post">
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
  },
  components: {
    SideBar,
  },
  data() {
    return {
      posts: [
        {
          id: 1,
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
      if (this.loading) return;
      this.loading = true;

      try {
        const response = await fetch(`/courses/${courseId}/enroll`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          },
        });

        const responseData = await response.json();

        if (response.ok) {
          this.showNotification('success', responseData.success || 'Inscrição realizada com sucesso!');
          this.isEnrolled = true;
        } else {
          this.showNotification('warning', responseData.error || 'Erro na inscrição');
        }
      } catch (error) {
        this.showNotification('error', error.message || 'Erro inesperado');
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
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          },
        });

        const responseData = await response.json();

        if (response.ok) {
          this.showNotification('success', responseData.success || 'Desinscrição realizada!');
          this.isEnrolled = false;
        } else {
          this.showNotification('warning', responseData.error || 'Erro na desinscrição');
        }
      } catch (error) {
        this.showNotification('error', error.message || 'Erro inesperado');
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
    }
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

/* Botão Inscrever (modificado) */
.actions button.subscribe {
  background: #135572;
}

.actions button.subscribe:hover:not(:disabled) {
  background: #0e3d53;
}

/* Novo botão Desinscrever */
.actions button.unsubscribe {
  background: #dc3545;
}

.actions button.unsubscribe:hover:not(:disabled) {
  background: #bb2d3b;
}

/* Estado desabilitado para ambos */
.actions button:disabled {
  background: #b3b3b3 !important;
  cursor: not-allowed;
}

/* Botão Postar (mantido) */
.actions button.post {
  background: #135572;
}

.actions button.post:hover {
  background: #0e3d53;
}

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
</style>