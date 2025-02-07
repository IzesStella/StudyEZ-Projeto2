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
        <p>Não tem uma conta ainda?</p>
        <button @click="goToRegister" class="btn secondary">Cadastre-se</button>
        <p>Já é cadastrado?</p>
        <button @click="goToLogin" class="btn primary">Entrar</button>
      </div>
      
      <div class="banner">
        <img src="/images/bannercoruja.jpg" alt="Banner StudyEZ" class="banner-image" />
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer" @click="goToAbout">SOBRE NÓS</footer>
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
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
}

.banner {
  width: 100%;
  max-width: 1000px;
  margin: 0 auto;
}

.banner-image {
  width: 100%;
  height: auto;
  display: block;
}

.footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  text-align: center;
  background: #fdf5cc;
  padding: 10px;
  cursor: pointer;
}
</style>
