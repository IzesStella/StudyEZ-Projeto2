<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
  mustVerifyEmail: Boolean,
  status: String,
});
</script>

<template>
  <Head title="Profile" />
  <MainLayout class>
    <!-- Cabeçalho do Perfil: estrutura original -->
    <div class="profile-header">
      <div class="profile-photo-and-name">
        <img
          :src="profilePhoto || '/images/default-profile.png'"
          alt="Foto de perfil"
          class="profile-photo"
        />
        <span class="profile-name">
          {{ $page.props.auth.user.name }}
        </span>
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
          <DropdownLink :href="route('logout')" method="post" as="button">
            Log Out
          </DropdownLink>
        </template>
      </Dropdown>
    </div>

    <!-- Modal de edição do perfil (permanece inalterado) -->
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
          <div class="modal-section">
            <h1 class="section-title">Meu Perfil</h1>
            <ProfilePhotoUploader />
          </div>
          <div class="modal-section form-section">
            <UpdateProfileInformationForm
              :must-verify-email="mustVerifyEmail"
              :status="status"
            />
          </div>
          <div class="modal-section form-section">
            <UpdatePasswordForm />
          </div>
          <div class="modal-section form-section">
            <DeleteUserForm />
          </div>
        </div>
      </div>
    </div>

    <!-- Abas (Postagens e Comentários) permanecem inalteradas -->
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
            <img
              :src="profilePhoto"
              alt="Foto de perfil"
              class="tab-item-photo"
            />
            <span>{{ $page.props.auth.user.name }}</span>
            <p>Comentarios</p>
          </div>
        </div>
        <!-- Conteúdo Postagens -->
        <div v-if="isPostsVisible" class="tab-pane">
          <div class="tab-item">
            <img
              :src="profilePhoto || '/images/default-profile.png'"
              alt="Foto de perfil"
              class="tab-item-photo"
            />
            <span>{{ $page.props.auth.user.name }}</span>
            <p>Posts</p>
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
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import ProfilePhotoUploader from '@/Components/ProfilePhotoUploader.vue';

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
    },
  },
  components: {
    MainLayout,
    Dropdown,
    DropdownLink,
    ProfilePhotoUploader,
    DeleteUserForm,
    UpdatePasswordForm,
    UpdateProfileInformationForm,
  },
};
</script>

<style scoped>
/* ----- Cabeçalho do Perfil (layout original) ----- */
.profile-header {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 48%;
}

.profile-photo-and-name {
  height: 230px;
  width: 230px;
  margin-top: 4rem; /* equivalente a mt-16 */
  display: flex;
  justify-content: center;
  align-items: center;
}

.profile-photo {
  border-radius: 50%;
  width: 230px;
  height: 230px;
  object-fit: cover;
}

.profile-name {
  font-size: 2rem; /* text-2xl */
  font-weight: bold;
  margin-left: 0.5rem; /* pequeno afastamento */
}

/* ----- Botão "Opções de Perfil" ----- */
.profile-options-button {
  display: inline-flex;
  align-items: center;
  padding: 0.5rem 0.75rem;
  border: none;
  font-size: 1rem;
  font-weight: 500;
  background-color: #135572; /* cor solicitada */
  color: #fff;
  border-radius: 0.375rem;
  cursor: pointer;
  transition: background 0.15s ease-in-out;
}

.profile-options-button:hover {
  background-color: #135572;
}

/* Wrapper para o trigger do Dropdown */
.dropdown-trigger {
  display: inline-flex;
  border-radius: 0.375rem;
}

/* Itens do Dropdown */
.dropdown-item {
  width: 100%;
  text-align: left;
  font-size: 0.875rem;
  padding: 0.5rem 1rem;
  color: #374151;
  background: transparent;
  border: none;
  cursor: pointer;
  transition: background 0.15s ease-in-out;
}

.dropdown-item:hover {
  background: #f3f4f6;
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
  background-color: rgba(107, 114, 128, 0.5);
  z-index: 50;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: auto;
}

.modal-content {
  background-color: #fff;
  width: 100%;
  max-width: 60rem; /* ~ 60rem */
  max-height: 90%;
  overflow: auto;
  border-radius: 1rem;
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
  padding: 1.5rem;
  position: relative;
}

.modal-header {
  background-color: #1f2937;
  color: #fff;
  padding: 1rem;
  border-top-left-radius: 1rem;
  border-top-right-radius: 1rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.modal-title {
  font-size: 1.125rem;
  font-weight: 600;
}

.close-button {
  background: none;
  border: none;
  color: #6b7280;
  cursor: pointer;
  transition: color 0.15s ease-in-out;
}

.close-button:hover {
  color: #374151;
}

.icon {
  width: 1.5rem;
  height: 1.5rem;
}

.modal-section {
  padding: 1.5rem;
  background-color: #fff;
  border-radius: 0.5rem;
  margin-bottom: 1rem;
}

.section-title {
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 1rem;
}

.form-section {
  background-color: #f9fafb;
  border-radius: 0.5rem;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

/* ----- Abas (Postagens / Comentários) ----- */
.tabs-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-left: 1.25rem;
}

.tabs-header {
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  margin-left: 8rem;
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
  height: 100%;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.tab-pane {
  border-bottom: 1px solid rgba(0, 0, 0, 0.9); /* 90% opacidade */
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
