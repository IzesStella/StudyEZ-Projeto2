<template>
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <SideBar />
    <!-- Main Content -->
    <div
      class="flex-1 ml-32 p-5 text-center overflow-y-auto h-screen box-border"
    >
      <!-- Top Bar with Search -->
      <div
        class="flex justify-center items-center w-full py-2 px-8 bg-white z-10"
      >
        <input
          type="text"
          v-model="searchQuery"
          placeholder="Pesquisar novas comunidades..."
          class="w-3/5 p-2 text-base border border-gray-300 rounded-full outline-none"
        />
      </div>

      <!-- Cards Section -->
      <section class="mt-5 text-center">
        <h2>Conheça novas disciplinas:</h2>
        <div class="grid grid-cols-3 gap-5 mt-5 relative">
          <div
            v-for="disciplina in filteredDisciplinas"
            :key="disciplina.nome"
            class="bg-gray-50 rounded-xl p-5 text-left shadow-lg transition-transform transform hover:translate-y-[-5px] hover:shadow-2xl w-[350px] mx-auto min-h-[210px] flex flex-col relative"
            :style="{ backgroundColor: disciplina.cor }"
          >
            <!-- Cabeçalho com imagem circular e título alinhados -->
            <div class="flex items-center mb-2">
              <img
                src="/images/logic-icon.png"
                alt="Comunidade"
                class="w-10 h-10 rounded-full object-cover mr-2"
              />
              <h3 class="text-lg font-bold text-black m-0">
                {{ disciplina.nome }}
              </h3>
            </div>
            <p class="text-sm text-black leading-6 text-center my-3">
              {{ disciplina.descricao }}
            </p>
            <button
              class="bg-white text-black font-bold rounded-lg py-2 px-4 block mt-auto self-end mr-2 mb-2 hover:bg-gray-300"
              @click="goToCommunity"
            >
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
import SideBar from '../Components/SideBar.vue';
export default {
  components: {
    FontAwesomeIcon,
    SideBar,
  },
  data() {
    return {
      searchQuery: '',
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
  computed: {
    filteredDisciplinas() {
      if (!this.searchQuery) {
        return this.disciplinas;
      }

      const query = this.searchQuery.toLowerCase();
      return this.disciplinas.filter((disciplina) => {
        return (
          disciplina.nome.toLowerCase().includes(query) ||
          disciplina.descricao.toLowerCase().includes(query)
        );
      });
    },
  },
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
</style>
