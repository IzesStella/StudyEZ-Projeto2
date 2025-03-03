<template>
  <div class="searchscreen-container">
    <!-- Sidebar -->
    <div class="sidebar">
      <img src="/images/zizi.png" alt="StudyEZ Logo" class="logo small-logo" />
      <nav>
        <button class="nav-button" @click="goToHome">
          <font-awesome-icon icon="home" style="color: #ce9e10" />
        </button>
        <button class="nav-button" style="color: #3885a7" @click="goToSearch">
          <font-awesome-icon icon="plus" />
        </button>
      </nav>
      <div class="profile-section" @click="goToProfile">
        <img
          src="/images/profile-icon.png"
          alt="User Profile"
          class="profile-icon"
        />
      </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Top Bar with Search -->
      <div class="top-bar">
        <input
          type="text"
          placeholder="Pesquisar novas comunidades..."
          class="search-bar"
        />
      </div>

      <!-- Cards Section -->
      <section class="disciplinas">
        <h2>Conheça novas disciplinas:</h2>
        <div class="disciplinas-grid">
          <div
            v-for="disciplina in disciplinas"
            :key="disciplina.nome"
            class="disciplina-card"
            :style="{ backgroundColor: disciplina.cor }"
          >
            <!-- Cabeçalho com imagem circular e título alinhados -->
            <div class="card-header">
              <img
                src="/images/logic-icon.png"
                alt="Comunidade"
                class="community-icon"
              />
              <h3>{{ disciplina.nome }}</h3>
            </div>
            <p>{{ disciplina.descricao }}</p>
            <button class="btn community-button" @click="goToCommunity">
              ENTRAR
            </button>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import { router } from '@inertiajs/vue3';

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

export default {
  components: {
    FontAwesomeIcon,
  },
  data() {
    return {
      disciplinas: [
        {
          nome: 'Lógica de Programação',
          descricao:
            'Essa comunidade foca em conceitos básicos e avançados de lógica de programação.',
          cor: '#d9f8c4',
        },
        {
          nome: 'Engenharia de Software',
          descricao:
            'Aprenda sobre design, arquitetura e ciclo de vida do software.',
          cor: '#c4f0f8',
        },
        {
          nome: 'Banco de Dados',
          descricao: 'Explore conceitos de modelagem e gerenciamento de dados.',
          cor: '#e3d9f8',
        },
        {
          nome: 'Desenvolvimento Web',
          descricao: 'Aprenda sobre criação de sites e aplicações modernas.',
          cor: '#f8d9d9',
        },
        {
          nome: 'Inteligência Artificial',
          descricao: 'Descubra técnicas de machine learning e redes neurais.',
          cor: '#fff2d4',
        },
        {
          nome: 'Redes de Computadores',
          descricao:
            'Entenda como funcionam as redes e a segurança da informação.',
          cor: '#f8d4e4',
        },
      ],
    };
  },
  methods: {
    goToProfile() {
      router.get('/profile');
    },
    goToHome() {
      router.get('/dashboard');
    },
    goToSearch() {
      router.get('/search');
    },
    goToCommunity() {
      router.get('/community');
    },
  },
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

.searchscreen-container {
  display: flex;
  height: 100vh;
  overflow: hidden;
  overflow: auto;
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

.small-logo {
  width: 80px;
}

nav {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100%;
  padding-bottom: 20px;
}

h2 {
  font-family:
    system-ui,
    -apple-system,
    BlinkMacSystemFont,
    'Segoe UI',
    Roboto,
    Oxygen,
    Ubuntu,
    Cantarell,
    'Open Sans',
    'Helvetica Neue',
    sans-serif;
  font-size: 135%;
  font-weight: bold;
  margin-top: 30px;
  margin-bottom: 30px;
}

.nav-button {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50px;
  height: 50px;
  background-color: #ffffff;
  border: none;
  border-radius: 50%;
  font-size: 1.5rem;
  cursor: pointer;
  margin-bottom: 10px;
  transition: all 0.2s ease-in-out;
}

.nav-button:hover {
  color: #000;
}

.profile-section {
  margin-top: auto;
  cursor: pointer;
}

.profile-icon {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: 2px solid #ccc;
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
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  padding: 10px 30px;
  font-family: 'Montserrat', sans-serif;
  background: white;
  z-index: 1000;
}

.search-bar {
  width: 60%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 20px;
  outline: none;
}

.disciplinas {
  margin-top: 20px;
  text-align: center;
}

.disciplinas-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-top: 20px;
  position: relative;
}

.disciplina-card {
  background-color: #f9f9f9;
  border-radius: 10px;
  padding: 20px 20px 10px 20px;
  text-align: left;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  transition:
    transform 0.3s ease,
    box-shadow 0.3s ease;
  width: 350px;
  margin: 0 auto;
  min-height: 210px;
  display: flex;
  flex-direction: column;
  position: relative;
}

.disciplina-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
}

/* Cabeçalho do card com imagem e título alinhados */
.card-header {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.community-icon {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
  margin-right: 10px;
}

.disciplina-card h3 {
  font-size: 15px;
  font-weight: bold;
  color: #000000;
  margin: 0;
  font-family: 'Montserrat', sans-serif;
}

.disciplina-card p {
  font-size: 14px;
  color: #000000;
  line-height: 1.5;
  text-align: center;
  margin: 15px 0;
}

.community-button {
  background-color: #ffffff;
  color: #000;
  font-weight: bold;
  border-radius: 10px;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  display: block;

  /* Empurra o botão para baixo e alinha à direita */
  margin-top: auto;
  align-self: flex-end;

  /* Margens menores para ficar mais perto das bordas */
  margin-right: 10px;
  margin-bottom: 10px;
  margin-left: 0;
}

.community-button:hover {
  background-color: #c5c5c5;
}
</style>
