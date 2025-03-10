<template>
  <MainLayout>
    <div class="flex h-screen overflow-hidden">
      <!-- Main Content -->
      <div class="flex-1 p-5 text-center overflow-y-auto h-screen box-border">
        <!-- Top Bar with Search -->
        <div class="flex justify-center items-center w-full py-2 bg-white z-10">
          <input
            type="text"
            v-model="searchQuery"
            placeholder="Pesquisar novas comunidades..."
            class="w-full max-w-[1090px] p-2 text-base border border-gray-300 rounded-full outline-none"
          />
        </div>

        <!-- Cards Section -->
        <section class="flex w-full flex-col justify-center items-center p-2">
          <h2 class="text-xl font-bold mt-8" style="font-family: 'Montserrat', sans-serif;">
               Conheça novas disciplinas:
          </h2>

          <div
            class="grid w-ful grid-cols-1 min-[830px]:grid-cols-2 xl:grid-cols-3 gap-5 mt-5 relative"
          >
            <div
              v-for="disciplina in filteredDisciplinas"
              :key="disciplina.nome"
              class="bg-gray-50 rounded-xl p-5 text-left shadow-lg transition-transform transform hover:translate-y-[-5px] hover:shadow-2xl w-full min-[830px]:w-[350px] mx-auto min-h-[210px] flex flex-col relative"
              :style="{ backgroundColor: disciplina.cor }"
            >
              <!-- Cabeçalho com imagem circular e título alinhados -->
              <div class="flex items-center gap-2 mb-2">
                <img
                  :src="disciplina.imagem"
                  alt="Ícone da disciplina"
                  class="w-10 h-10 rounded-full object-cover"
                />

                <h3 class="text-lg font-bold text-black m-0">
                  {{ disciplina.nome }}
                </h3>
              </div>
              <p class="text-sm text-black leading-6 text-start my-3">
                {{ disciplina.descricao }}
              </p>
              <div class="flex justify-end items-end h-full">
                <button
                  class="bg-white text-black font-bold rounded-lg py-2 px-4 block hover:bg-gray-300"
                  @click="goToCommunityByDiscipline(disciplina)"
                >
                  ENTRAR
                </button>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </MainLayout>
</template>

<script>
import { router } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import SideBar from '../Components/SideBar.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
export default {
  components: {
    FontAwesomeIcon,
    SideBar,
    MainLayout,
  },
  data() {
    return {
      searchQuery: '',
      disciplinas: [
        {
          id: 1,
          imagem: '/images/logicadeprogramacao.png',
          nome: 'Lógica de Programação',
          descricao: 'Aprenda a resolver problemas com código e algoritmos.',
          cor: '#d9f8c4',
        },
        {
          id: 2,
          imagem: '/images/engenharia.png',
          nome: 'Engenharia de Software',
          descricao: 'Estude metodologias para criar software de qualidade.',
          cor: '#c4f0f8',
        },
        {
          id: 3,
          imagem: '/images/bancodedados.png',
          nome: 'Banco de Dados',
          descricao: 'Gerencie e otimize bancos de dados com SQL.',
          cor: '#e3d9f8',
        },
        {
          id: 4,
          imagem: '/images/web.png',
          nome: 'Desenvolvimento Web',
          descricao:
            'Crie sites e apps com HTML, CSS, JavaScript e frameworks.',
          cor: '#f8d9d9',
        },
        {
          id: 5,
          imagem: '/images/design.png',
          nome: 'Design',
          descricao: 'Crie interfaces funcionais e responsivas.',
          cor: '#fff2d4',
        },
        {
          id: 6,
          imagem: '/images/redes.png',
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
    goToCommunityByDiscipline(disciplina) {
      // Redireciona para a comunidade específica com base no ID da disciplina
      router.get(`/community/${disciplina.id}`);
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
