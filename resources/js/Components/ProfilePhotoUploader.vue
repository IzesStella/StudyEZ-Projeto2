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

const deleteProfilePhoto = async () => {
  try {
    await axios.post('/api/user/delete-photo');
    profilePhoto.value = '/images/default-avatar.png';
  } catch (error) {
    console.error('Erro ao deletar a foto:', error);
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
      :src="profilePhoto || '/images/default-profile.png'"
      alt="Foto de Perfil"
      class="rounded-full w-32 h-32 mx-auto mb-4"
    />

    <label class="upload-photo">
      Escolher Foto
      <input type="file" ref="fileInput" class="hidden" @change="uploadPhoto" />
    </label>

    <button @click="deleteProfilePhoto" class="delete-photo">
      Deletar Foto
    </button>

    <p v-if="isUploading" class="text-gray-500 mt-2">Enviando...</p>
  </div>
</template>

<style scoped>
.upload-photo {
  display: inline-flex;
  align-items: center;
  padding: 8px 10px;
  background-color: #135572; 
  color: white;
  border-radius: 5px;
  cursor: pointer;
  margin-right: 20px;
}

.delete-photo {
  display: inline-flex;
  align-items: center;
  padding: 8px 10px;
  background-color: #ef4444;
  color: #ffffff;
  border-radius: 5px;
  cursor: pointer;
}
</style>
