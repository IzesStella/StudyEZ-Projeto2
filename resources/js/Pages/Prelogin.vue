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
      <!-- Top Bar -->
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

      <!-- Banner -->
      <div class="banner">
        <img src="/images/bannercoruja.jpg" alt="Banner StudyEZ" class="banner-image" />
      </div>

      <!-- Nossas Comunidades -->
      <section class="comunidades">
        <h2>NOSSAS COMUNIDADES</h2>
        <div class="comunidades-grid">
          <div class="comunidade-card" style="background-color: #ffe4e1;">
            <h3>Lógica de Programação</h3>
            <p>Foco em conceitos básicos e avançados de lógica de programação.</p>
            <button class="btn join-button">UNIR-SE</button>
          </div>
          <div class="comunidade-card" style="background-color: #e0ffe4;">
            <h3>Desenvolvimento Web</h3>
            <p>Aprenda sobre criação de sites e aplicações modernas.</p>
            <button class="btn join-button">UNIR-SE</button>
          </div>
          <div class="comunidade-card" style="background-color: #e4e1ff;">
            <h3>Banco de Dados</h3>
            <p>Explore conceitos de modelagem e gerenciamento de dados.</p>
            <button class="btn join-button">UNIR-SE</button>
          </div>
          <div class="comunidade-card" style="background-color: #fff5e1;">
            <h3>Inteligência Artificial</h3>
            <p>Descubra técnicas de machine learning e redes neurais.</p>
            <button class="btn join-button">UNIR-SE</button>
          </div>
          <div class="comunidade-card" style="background-color: #e1f5ff;">
            <h3>Redes de Computadores</h3>
            <p>Entenda como funcionam as redes e a segurança da informação.</p>
            <button class="btn join-button">UNIR-SE</button>
          </div>
          <div class="comunidade-card" style="background-color: #ffe1f0;">
            <h3>Engenharia de Software</h3>
            <p>Aprenda sobre design, arquitetura e ciclo de vida do software.</p>
            <button class="btn join-button">UNIR-SE</button>
          </div>
          <div class="comunidade-card" style="background-color: #e4fff1;">
            <h3>Cibersegurança</h3>
            <p>Proteja sistemas e dados contra ameaças cibernéticas.</p>
            <button class="btn join-button">UNIR-SE</button>
          </div>
          <div class="comunidade-card" style="background-color: #fff1e4;">
            <h3>Computação em Nuvem</h3>
            <p>Descubra como funcionam os serviços e arquiteturas em nuvem.</p>
            <button class="btn join-button">UNIR-SE</button>
          </div>
        </div>
      </section>

      <!-- FAQ -->
      <section class="faq">
        <h2>FAQ - COMO FUNCIONA NOSSO SITE?</h2>
        <div class="faq-item">
          <h3>O QUE É O STUDYEZ?</h3>
          <p>O StudyEZ é uma plataforma de monitorias online onde alunos podem receber ajuda em diversas matérias, tirar dúvidas e organizar seus estudos de forma eficiente.</p>
        </div>

        <div class="faq-item">
          <h3>COMO POSSO ENCONTRAR UMA MONITORIA?</h3>
          <p>Você pode navegar pelas comunidades e se unir a elas. Cada comunidade possui um título com a matéria relacionada, uma breve descrição e um botão para saber mais e dentro dela tem o espaço de perguntas e respostas.</p>
        </div>

        <div class="faq-item">
          <h3>O QUE É O PLANNER DO SITE?</h3>
          <p>O planner é uma ferramenta integrada ao aplicativo que permite organizar seus estudos. Você pode anotar tarefas e adicionar lembretes diários.</p>
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
  height: 100%;
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
  overflow-y: auto;
  height: 100vh;
  box-sizing: border-box;
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
  transform: translateX(-50%);
  background: white;
  z-index: 1000;
  gap: 50px;
}

.auth-options {
  display: flex;
  align-items: center;
  gap: 5px;
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
  margin-top: 100px;
}

.banner-image {
  width: 100%;
  height: auto;
  display: block;
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);
  border-radius: 15px;
  object-fit: cover;
}

.comunidades {
  margin-top: 20px;
}

.comunidades-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-top: 20px;
}

.comunidade-card {
  background-color: #f9f9f9;
  border-radius: 10px;
  padding: 15px;
  text-align: center;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.comunidade-card h3 {
  font-size: 18px;
  margin-bottom: 10px;
}

.comunidade-card p {
  font-size: 14px;
  margin-bottom: 15px;
}

.join-button {
  background-color: #b3d8ff;
  color: #000;
  font-weight: bold;
  border-radius: 10px;
}

.footer {
  position: fixed;
  text-align: center;
  bottom: 25px;
  left: 50%;
  transform: translateX(-50%);
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
