<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
  mustVerifyEmail: Boolean,
  status: String,
});
</script>

<template>
  <Head title="Profile" />
  <MainLayout>
    <div class="container">
      <!-- Cabeçalho do Perfil -->
      <div class="profile-header">
        <div class="profile-photo-and-name">
          <img
          :src="profilePhoto || '/images/default-profile.png'"
          alt="Foto de perfil"
          class="profile-photo"
          />
          <span class="profile-name">{{ $page.props.auth.user.name }}</span>
        </div>
        
        <Dropdown align="right" width="48">
          <template #trigger>
            <span class="dropdown-trigger">
              <button type="button" class="profile-options-button">
                Opções de Perfil
              </button>
            </span>
          </template>
          
          <template #content>
            <button class="dropdown-item" @click="showEditProfile">
              Editar Perfil
            </button>
            <DropdownLink class="dropdown-item" :href="route('logout')" method="post" as="button">
              Log Out
            </DropdownLink>
          </template>
        </Dropdown>
      </div>
      
      <!-- Modal de Edição do Perfil -->
      <div class="profile-edit-modal-container">
        <div v-if="isEditProfileVisible" class="modal-backdrop">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Editar Perfil</h3>
              <button class="close-button" @click="closeEditProfile">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <!-- Seção de Upload da Foto -->
            <div class="modal-section">
              <ProfilePhotoUploader ref="profilePhotoUploader" />
            </div>
            <!-- Formulário de atualização do nome e email -->
            <div class="modal-section form-section">
              <UpdateProfileInformationForm
              ref="updateProfileInformationForm"
              :must-verify-email="mustVerifyEmail"
              :status="status"
              />
            </div>
          </div>
        </div>
      </div>
      
      <!-- Abas (Postagens e Comentários) -->
      <div class="tabs-container">
        <div class="tabs-header">
          <button
          :class="['tabs-button', activeTab === 'posts' ? 'tabs-button-active' : '']"
          @click="showPosts"
          >
          Postagens
        </button>
        <button
        :class="['tabs-button', activeTab === 'comments' ? 'tabs-button-active' : '']"
        @click="showComments"
        >
        Comentarios
      </button>
    </div>
    <div class="tabs-content">
      <!-- Conteúdo Comentários -->
      <div v-if="isCommentsVisible" class="tab-pane">
        <div class="tab-item">
          <img :src="profilePhoto" alt="Foto de perfil" class="tab-item-photo" />
          <span>{{ $page.props.auth.user.name }}</span>
          <p>Comentarios</p>
        </div>
      </div>
      <!-- Conteúdo Postagens -->
      <div v-if="isPostsVisible" class="tab-pane">
        <div class="tab-item">
          <img :src="profilePhoto || '/images/default-profile.png'" alt="Foto de perfil" class="tab-item-photo" />
          <span>{{ $page.props.auth.user.name }}</span>
          <p>Posts</p>
        </div>
      </div>
    </div>
  </div>
</div>
  </MainLayout>
</template>

<script>
import { router } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import ProfilePhotoUploader from '@/Components/ProfilePhotoUploader.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';

export default {
  data() {
    return {
      profilePhoto: this.$page.props.auth.user.profile_photo
        ? '/' + this.$page.props.auth.user.profile_photo
        : '/images/default-avatar.png',
      isEditProfileVisible: false,
      isCommentsVisible: false,
      isPostsVisible: true,
      activeTab: 'posts',
    };
  },
  methods: {
    showComments() {
      this.isCommentsVisible = true;
      this.isPostsVisible = false;
      this.activeTab = 'comments';
    },
    showPosts() {
      this.isPostsVisible = true;
      this.isCommentsVisible = false;
      this.activeTab = 'posts';
    },
    showEditProfile() {
      this.isEditProfileVisible = true;
    },
    closeEditProfile() {
      this.isEditProfileVisible = false;
    },
    goToRoute(route) {
      router.visit(route);
    }
  },
  components: {
    MainLayout,
    Dropdown,
    DropdownLink,
    ProfilePhotoUploader,
    UpdateProfileInformationForm,
  },
};
</script>

<style scoped>
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
}

/* ----- Cabeçalho do Perfil ----- */
.profile-header {
  display: flex;
  align-items: center;
  justify-content: space-between; /* Ou 'center', se preferir */
  margin-top: 4rem;
}

.profile-photo-and-name {
  display: flex;
  align-items: center;
}

.profile-photo {
  border-radius: 50%;
  width: 230px;
  height: 230px;
  object-fit: cover;
}

.profile-name {
  font-size: 2rem;
  font-weight: bold;
  margin-left: 0.5rem;
  white-space: normal;
  word-break: break-word;
  max-width: 700px; 
}

/* ----- Botão "Opções de Perfil" ----- */
.profile-options-button {
  display: inline-flex;
  align-items: center;
  padding: 0.5rem 0.75rem;
  border: none;
  font-size: 1rem;
  font-weight: 500;
  background-color: #135572;
  color: #fff;
  border-radius: 0.375rem;
  cursor: pointer;
  transition: background 0.15s ease-in-out;
}

.profile-options-button:hover {
  background-color: #135572;
}

.dropdown-trigger {
  display: inline-flex;
  border-radius: 0.375rem;
}

.dropdown-item {
  width: 100%;
  text-align: left;
  font-size: 0.875rem;
  padding: 0.5rem 1rem;
  color: #ffffff;
  background: #135572;
  border: none;
  cursor: pointer;
}

.dropdown-item:hover {
  background: #93c5fd;
}

/* ----- Modal (Editar Perfil) ----- */
.profile-edit-modal-container {
  padding: 3rem 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-backdrop {
  position: fixed;
  inset: 0;
  background-color: rgba(28, 33, 43, 0.5);
  z-index: 50;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: auto;
}

.modal-content {
  background-color: #fff;
  width: 100%;
  max-width: 50%;
  max-height: 90%;
  overflow: auto;
  border-radius: 5px;
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
  position: relative;
}

.modal-header {
  background-color: #135572;
  color: #fff;
  padding: 3%;
  border-radius: 20px 20px 0px 0px;
  display: flex;
  justify-content: space-between;
}

.modal-title {
  font-size: 24px;
  font-weight: bold;
}

.close-button {
  color: #ffffff;
  cursor: pointer;
  transition: color 0.15s ease-in-out;
}

.close-button:hover {
  color: #940000;
}

.icon {
  width: 20px;
  height: 20px;
}

.modal-section {
  padding: 5%;
  margin-bottom: 1%;
}

/* ----- Abas (Postagens / Comentários) ----- */
.tabs-header {
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
}

.tabs-button {
  padding: 0.5rem 1rem;
  background: transparent;
  border: none;
  border-radius: 0.75rem;
  cursor: pointer;
  outline: none;
  font-size: 1rem;
  margin-right: 0.5rem;
  transition: background 0.15s ease-in-out;
}

.tabs-button-active {
  background-color: #93c5fd;
}

.tabs-content {
  width: 100%;
  margin: 0 auto;
  padding: 0 1rem;   
}

.tab-pane {
  border-bottom: 1px solid rgba(0, 0, 0, 0.9);
  width: 80%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 1rem;
  margin-top: 1rem;
}

.tab-item {
  display: flex;
  flex-direction: row;
  align-self: flex-start;
  gap: 0.5rem;
}

.tab-item-photo {
  border-radius: 50%;
  width: 60px;
  height: 60px;
  object-fit: cover;
}
</style>
