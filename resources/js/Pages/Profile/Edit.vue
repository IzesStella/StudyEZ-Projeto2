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
    <div class="relative flex justify-center items-center gap-[48%]">
      <div class="h-[230] w-[230] mt-16 flex justify-center items-center">
        <img
          src="https://placehold.co/230x230"
          alt="img"
          class="rounded-full mr-5"
        />
        <span class="text-2xl font-bold">
          {{ $page.props.auth.user.name }}
        </span>
      </div>

      <Dropdown align="right" width="48">
        <template #trigger>
          <span class="inline-flex rounded-md">
            <button
              type="button"
              class="self-end inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
            >
              Opções de Perfil
            </button>
          </span>
        </template>

        <template #content>
          <button
            class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out"
            @click="showEditProfile"
          >
            Editar Perfil
          </button>
          <DropdownLink :href="route('logout')" method="post" as="button">
            Log Out
          </DropdownLink>
        </template>
      </Dropdown>
    </div>

    <div class="py-12 flex justify-center items-center">
      <div
        v-if="isEditProfileVisible"
        class="fixed inset-0 bg-gray-500 bg-opacity-50 z-50 flex items-center justify-center overflow-auto"
      >
        <div
          class="bg-white w-full max-w-4xl max-h-[90%] overflow-auto rounded-xl shadow-lg p-6 space-y-8 relative"
        >
          <div
            class="bg-gray-800 text-white p-4 rounded-t-xl shadow-md flex justify-between items-center"
          >
            <h3 class="text-lg font-semibold">Editar Perfil</h3>
            <button
              class="text-gray-500 hover:text-gray-700 transition"
              @click="closeEditProfile"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
          <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <UpdateProfileInformationForm
              :must-verify-email="mustVerifyEmail"
              :status="status"
              class="max-w-xl mx-auto"
            />
          </div>

          <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <UpdatePasswordForm class="max-w-xl mx-auto" />
          </div>

          <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <DeleteUserForm class="max-w-xl mx-auto" />
          </div>
        </div>
      </div>
    </div>

    <div class="flex flex-col justify-center ml-5">
      <div class="relative flex flex-row justify-start ml-32">
        <button
          class="px-4 py-2 bg-transparent rounded-xl focus:outline-none"
          :class="{
            'bg-blue-300 transition ease-in-out duration-150':
              activeTab === 'posts',
          }"
          @click="showPosts"
        >
          Postagens
        </button>
        <button
          class="px-4 py-2 bg-transparent rounded-xl focus:outline-none"
          :class="{
            'bg-blue-300 transition ease-in-out duration-150 ':
              activeTab === 'comments',
          }"
          @click="showComments"
        >
          Comentarios
        </button>
      </div>

      <div class="h-full overflow-hidden flex flex-col place-items-center">
        <div
          v-if="isCommentsVisible"
          class="border-b border-black w-[80%] flex flex-col items-center justify-center p-4"
        >
          <!-- conteudo dos comentarios aqui  -->
          <div class="flex flex-row self-start">
            <img
              src="https://placehold.co/60x60"
              alt="img"
              class="rounded-full mr-5"
            />
            <span class="">
              {{ $page.props.auth.user.name }}
            </span>
            <p>Comentarios</p>
          </div>
        </div>
        <div
          v-if="isPostsVisible"
          class="border-b border-black w-[80%] flex flex-col items-center justify-center p-4"
        >
          <!-- conteudo dos posts aqui  -->
          <div class="flex flex-row self-start">
            <img
              src="https://placehold.co/60x60"
              alt="img"
              class="rounded-full mr-5"
            />
            <span class="">
              {{ $page.props.auth.user.name }}
            </span>
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

export default {
  data() {
    return {
      photoUrl: 'https://via.placeholder.com/150',
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
  },
};
</script>
