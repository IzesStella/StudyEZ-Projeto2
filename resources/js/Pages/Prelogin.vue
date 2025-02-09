<template>
  <div class="prelogin-container">
    <!-- Sidebar -->
    <div class="sidebar">
      <img src="/images/zizi.png" alt="StudyEZ Logo" class="logo small-logo" />
      <nav>
        <button class="nav-button home-button">🏠</button>
        <button class="nav-button grid-button">➕</button>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="top-bar">
      <div class="auth-options">
        <p>Não tem uma conta ainda?</p>
        <button @click="goToRegister" class="btn secondary">CADASTRE-SE</button>
      </div>
      <div class="auth-options">
        <p>Já é cadastrado?</p>
        <button @click="goToLogin" class="btn primary">ENTRAR</button>
      </div>
      </div>
      
      <div class="banner">
        <img src="/images/bannercoruja.jpg" alt="Banner StudyEZ" class="banner-image" />
      </div>
    </div>

    <div class="main-content">
      <section class="faq">
  <h2>FAQ - COMO FUNCIONA NOSSO SITE?</h2>

  <div class="faq-item">
    <h3>O QUE É O STUDYEZ?</h3>
    <p>O StudyEZ é uma plataforma de monitorias online onde alunos podem receber ajuda em diversas 
      matérias, tirar dúvidas e organizar seus estudos de forma eficiente.</p>
  </div>

  <div class="faq-item">
    <h3>COMO POSSO ENCONTRAR UMA MONITORIA?</h3>
    <p>Você pode navegar pelas comunidades e se unir a elas. Cada comunidade possui um título com a matéria 
      relacionada, uma breve descrição e um botão para saber mais e dentro dela tem o espaço de perguntas e 
      respostas.</p>
  </div>

  <div class="faq-item">
    <h3>O QUE É O PLANNER DO SITE?</h3>
    <p>O planner é uma ferramenta integrada ao aplicativo que permite organizar seus estudos. Você pode anotar 
      tarefas e adicionar lembretes diários.</p>
  </div>
</section>
    </div>

    <!-- Footer -->
    <footer class="footer btn secondary" @click="goToAbout">SOBRE NÓS</footer>
  </div>
</template>

<script>
import { router } from '@inertiajs/vue3';

export default {
  methods: {
    goToLogin() {
      router.get('/login');
    },
    goToRegister() {
      router.get('/register');
    },
    goToAbout() {
      router.get('/about');
    }
  }
};
</script>

<style scoped>

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

.prelogin-container {
  display: flex;
  height: 100vh;
  overflow: hidden;
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
}

.small-logo {
  width: 80px;
}

nav {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100%; /* Garante que os itens ocupem o espaço disponível */
}

.nav-button {
  background: none;
  border: none;
  font-size: 24px;
  cursor: pointer;
  margin: 15px 0;
  color: #555;
}

.nav-button:hover {
  color: #000;
}

.main-content {
  flex: 1;
  margin-left: 130px;
  padding: 20px;
  text-align: center;
}

.top-bar {
  position: fixed;
  display: flex;
  justify-content: center; 
  align-items: center;
  width: 100%;
  max-width: 900px;
  padding: 10px 30px;
  font-family: 'Montserrat', sans-serif;
  top: 0;
  left: 50%; 
  transform: translateX(-50%); /* Ajusta para o centro exato */
  background: white;
  z-index: 1000;
  gap: 50px;
}

.top-bar p {
  font-weight: bold;
  font-size: 20px;
  margin-right: 10px
}

.auth-options {
  gap: 5px;
  display: flex; 
  align-items: center;
  
}

.btn {
  font-family: 'Montserrat', sans-serif;
  border: none;
  padding: 10px 20px;
  font-size: 15px;
  border-radius: 15px;
  cursor: pointer;
  background-color: #c1e1ff; 
  color: #666666;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); 
}

.banner {
  position: fixed;
  top: 80px; /* Ajustado para não ficar colado na top-bar */
  left: 50%; /* Posiciona no meio */
  transform: translateX(-50%); /* Centraliza */
  width: 100%;
  max-width: 1000px;
}

.banner-image {
  width: 100%;
  height: auto;
  display: block;
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); 
  border-radius: 15px; 
  object-fit: cover;
}

.main-content {
    font-family: 'Montserrat', sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center; /* Centraliza os elementos na tela */
    text-align: left; /* Mantém o texto alinhado à esquerda */
    width: 100%;
    max-width: 900px; /* Ajusta a largura máxima */
    margin: 0 auto; /* Centraliza horizontalmente */
    padding: 20px;
    padding-top: 350px;
}

.faq {
  width: 100%;
  max-width: 900px;
  margin: 50px auto;
}

.faq h2 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.faq-item {
  margin-bottom: 20px;
}

.faq-item h3 {
  font-size: 18px;
  font-weight: bold;
}

.faq-item p {
  font-size: 16px;
  color: #333;
}


.footer {
  position: fixed;
  text-align: center;
  bottom: 25px; /* Distância do rodapé */
  left: 50%; /* Move o footer para o centro */
  transform: translateX(-50%); /* Ajusta para centralizar completamente */
  width: auto; 
  padding: 15px 30px;
  cursor: pointer;
  background-color: #b3d8ff;
  border-radius: 15px; 
  font-size: 20px; 
  font-weight: bold; 
  color: #000000; 
  font-family: 'Montserrat', sans-serif;
  
}
</style>
