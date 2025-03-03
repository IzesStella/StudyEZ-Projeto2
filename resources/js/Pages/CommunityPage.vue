<template>
  <div class="community-container">
    <!-- Sidebar -->
    <SideBar />
    <!-- Conteúdo principal -->
    <main class="main-content">
      <!-- Header da Comunidade -->
      <header class="community-header">
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
      </header>

      <!-- Lista de Postagens -->
      <section class="posts">
        <article v-for="post in posts" :key="post.id" class="post">
          <div class="post-header">
            <img :src="post.userAvatar" alt="Avatar" class="avatar" />
            <div>
              <h2>{{ post.title }}</h2>
              <p class="timestamp">{{ post.timestamp }}</p>
            </div>
          </div>
          <p class="post-content">{{ post.content }}</p>
          <div class="post-footer">
            <button class="comment-btn">
              💬 {{ post.comments }} Comentários
            </button>
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
          title: 'Como estudar programação?',
          content:
            'Como vocês estudam? Ainda mais uma linguagem diferente? Digo, não só copiar o código, mas realmente aprender sobre?',
          timestamp: 'há 7h',
          comments: 2,
        },
        {
          id: 2,
          userAvatar: '/images/user2.png',
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
  display: flex;
  height: 100vh;
  background-color: #f8f8f8;
}

.sidebar {
  width: 100px;
  background-color: #fdf5cc;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px 0;
  border-right: 1px solid #e0e0e0;
  margin-left: 30px;
  margin-top: 15px;
  margin-bottom: 15px;
  border-radius: 12px;
  position: fixed;
  height: calc(100% - 30px);
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
}

.sidebar-logo {
  width: 50px;
  margin-bottom: 20px;
}

.sidebar-nav {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.nav-icon {
  width: 30px;
  margin: 15px 0;
  cursor: pointer;
}

.main-content {
  flex: 1;
  padding: 20px;
  background: #ffffff;
  margin-left: 160px; /* Ajuste para a largura da sidebar + margens */
  margin-top: 15px;
  margin-bottom: 15px;
  border-radius: 12px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
}

.community-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: linear-gradient(to right, #91dd93, #72ff7a);
  padding: 20px;
  border-radius: 10px;
  color: white;
}

.community-logo {
  width: 80px;
}

.community-info h1 {
  margin: 0;
  font-size: 24px;
}

.community-info p {
  margin: 5px 0 0;
  font-size: 14px;
}

.actions button {
  margin-left: 10px;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
}

.subscribe {
  background: #3498db;
  color: white;
}

.post {
  background: white;
  padding: 15px;
  margin: 15px 0;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.post-header {
  display: flex;
  align-items: center;
}

.avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-right: 10px;
}

.username {
  font-weight: bold;
  font-size: 14px;
}

.timestamp {
  font-size: 12px;
  color: #888;
}

.post-content {
  margin: 10px 0;
  font-size: 14px;
}

.comment-btn {
  background: none;
  border: none;
  color: #3498db;
  cursor: pointer;
  font-size: 14px;
}
</style>
