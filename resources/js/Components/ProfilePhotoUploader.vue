<script setup>
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';

const user = usePage().props.auth.user;
const profilePhoto = ref(user.profile_photo || '/images/default-avatar.png');
const fileInput = ref(null);
const isUploading = ref(false);

const uploadPhoto = async () => {
  if (!fileInput.value.files[0]) return;

  isUploading.value = true;
  let formData = new FormData();
  formData.append('profile_photo', fileInput.value.files[0]);

  try {
    const response = await axios.post('/api/user/profile-photo', formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
      },
    });

    profilePhoto.value = response.data.photo_url;
  } catch (error) {
    console.error('Erro ao enviar a foto:', error);
  } finally {
    isUploading.value = false;
  }
};

onMounted(async () => {
  try {
    const response = await axios.get('/api/user');
    profilePhoto.value = response.data.profile_photo;
  } catch (error) {
    console.error('Erro ao carregar dados do usuário:', error);
  }
});
</script>

<template>
  <div class="text-center">
    <img
      :src="profilePhoto"
      alt="Foto de Perfil"
      class="rounded-full w-32 h-32 mx-auto mb-4"
    />

    <label class="cursor-pointer bg-blue-500 text-white px-4 py-2 rounded-md">
      Escolher Foto
      <input type="file" ref="fileInput" class="hidden" @change="uploadPhoto" />
    </label>

    <p v-if="isUploading" class="text-gray-500 mt-2">Enviando...</p>
  </div>
</template>
