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
    <div class="relative">
      <Dropdown align="right" width="48">
        <template #trigger>
          <span class="inline-flex rounded-md">
            <button
              type="button"
              class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
            >
              {{ $page.props.auth.user.name }}
            </button>
          </span>
        </template>

        <template #content>
          <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
          <DropdownLink :href="route('logout')" method="post" as="button">
            Log Out
          </DropdownLink>
          <button @click="showEditProfile">Editar Profile</button>
        </template>
      </Dropdown>

      <div class="mt-16 flex justify-center">
        <img :src="photoURL" alt="photo" class="" />
      </div>
    </div>

    <div class="py-12 flex-1">
      <div
        v-if="isEditProfileVisible"
        class="flex flex-col items-center justify-center content-center"
      >
        <button class="self-end" @click="closeEditProfile">Fechar</button>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          <div
            class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg"
          >
            <UpdateProfileInformationForm
              :must-verify-email="mustVerifyEmail"
              :status="status"
              class="max-w-xl"
            />
          </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <UpdatePasswordForm class="max-w-xl" />
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <DeleteUserForm class="max-w-xl" />
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
    };
  },
  methods: {
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
