<template>
    <div class="prelogin-container">
      <div class="sidebar">
        <img src="/images/zizi.png" alt="StudyEZ Logo" class="logo" />
        <nav>
          <button class="nav-button home-button">🏠</button>
          <button class="nav-button grid-button">➕</button>
        </nav>
      </div>
  
      <div class="content">
      <div class="text-container">
        <h1><em>Bem-vindo(a) ao StudyEZ!</em></h1>
        <p>
          Nossa plataforma ajuda você a organizar seus estudos de forma eficiente e produtiva. 
          Planeje seus horários com cronogramas personalizados e conecte-se com mentores experientes.
        </p>
      </div>

      <div class="cta-box">
        <p>Entre na sua conta e comece seus estudos!</p>
        <button @click="goToLogin" class="btn primary">Entrar</button>
        <p>Ainda não está cadastrado? <a @click="goToRegister" class="link">Cadastre-se</a></p>
      </div>
    </div>
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
      }
    }
  };
  </script>
  
  <style scoped>
  .prelogin-container {
    display: flex;
    height: 100vh;
    background-color: #f8f8f8;
    font-family: Arial, sans-serif;
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
  }
  
  .logo {
    width: 60px;
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
  
  .content {
  flex: 1;
  padding: 50px;
  display: flex;
  flex-direction: column;
  justify-content: space-between; /* Distribui o conteúdo no topo e na parte inferior */
  align-items: flex-start;
}

.text-container {
  align-self: flex-start; /* Garante que o texto fique no topo */
}

  
h1 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

p {
  font-size: 16px;
  line-height: 1.5;
  margin-bottom: 20px;
}

.cta-box {
  background: #fff3c4;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
  align-self: flex-start; /* Garante que o popup fique na parte inferior */
}

.cta-box p {
  margin: 10px 0;
}

.btn {
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  border-radius: 20px;
  font-size: 16px;
  margin-top: 10px;
  align-self: flex-start;
}
  
  .primary {
    background-color: #4a90e2;
    color: white;
  }
  
  .primary:hover {
    background-color: #357ab8;
  }
  
  .link {
    color: #4a90e2;
    cursor: pointer;
    text-decoration: underline;
    font-size: 14px;
  }
  
  .link:hover {
    color: #357ab8;
  }
  </style>
  