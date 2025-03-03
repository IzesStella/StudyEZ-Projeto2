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
          <h1>Lógica de Programação</h1>
          <p>Um espaço para aprender e compartilhar conhecimento</p>
        </div>
        <div class="actions">
          <button class="subscribe">Inscreva-se</button>
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
              <!-- Nome do usuário aqui -->
              <span class="timestamp">• {{ post.timestamp }}</span>
            </div>
          </div>
          <h2 class="post-title">{{ post.title }}</h2>
          <!-- Título da postagem movido para baixo -->
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
  components: {
    SideBar,
  },
  data() {
    return {
      posts: [
        {
          id: 1,
          userAvatar: '/images/user1.png',
          username: 'user1', // Nome do usuário adicionado
          title: 'Como estudar programação?',
          content:
            'Como vocês estudam? Ainda mais uma linguagem diferente? Digo, não só copiar o código, mas realmente aprender sobre?',
          timestamp: 'há 7h',
          comments: 0,
        },
        {
          id: 2,
          userAvatar: '/images/user2.png',
          username: 'user2', // Nome do usuário adicionado
          title: 'Botão não redireciona e baixa arquivo',
          content:
            'Criamos uma página de HTML para cadastro, mas há um botão que baixa o arquivo ao invés de redirecionar. Como corrigir?',
          timestamp: 'há 1 dia',
          comments: 0,
        },
      ],
    };
  },
};
</script>

<style scoped>
.community-container {
  padding: 40px;
  color: #000000;
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
  background: #135572;
  color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.post {
  border-bottom: 1px solid #000000;
  padding: 35px 0px;
  margin-top: 30px;
}

.post-header {
  display: flex;

  gap: 10px;
  font-size: 14px;
  font-weight: bold;
  color: #000000;
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
