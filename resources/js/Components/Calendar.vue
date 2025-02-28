<template>
  <div class="calendar">
    <Calendar expanded @dayclick="selectDay" />
    <div v-if="selectedDay" class="notes">
      <h3>Anotações para {{ selectedDay }}:</h3>
      <textarea v-model="notes[selectedDay]" placeholder="Adicione suas anotações aqui..."></textarea>
      <div class="notes-actions">
        <button class="btn save-button" @click="saveNotes">Salvar</button>
        <button class="btn clear-button" @click="clearNotes">Limpar</button>
      </div>
    </div>
  </div>
</template>

<script>
import { Calendar } from 'v-calendar';
import 'v-calendar/style.css';
import axios from 'axios';

const apiClient = axios.create({
  baseURL: 'http://127.0.0.1:8000/api',
  headers: {
    'Content-Type': 'application/json',
    'Authorization': `Bearer ${localStorage.getItem('token')}`, 
  },
});

export default {
  components: {
    Calendar,
  },
  data() {
    return {
      selectedDay: null,
      notes: {},
    };
  },
  methods: {
    async selectDay(day) {
      this.selectedDay = day.id;
      try {
        const response = await apiClient.get(`/notes/${this.selectedDay}`);
        this.notes[this.selectedDay] = response.data ? response.data.content : '';
      } catch (error) {
        console.error('Erro ao carregar anotações:', error);
      }
    },
    async saveNotes() {
  try {
    console.log('Enviando dados:', {
      date: this.selectedDay,
      content: this.notes[this.selectedDay],
    });

    const response = await apiClient.post('/notes', {
      date: this.selectedDay,
      content: this.notes[this.selectedDay],
    });

    console.log('Resposta do backend:', response.data);
    alert('Anotações salvas com sucesso!');
  } catch (error) {
    console.error('Erro ao salvar anotações:', error);
  }
},
    clearNotes() {
      if (this.selectedDay) {
        this.notes[this.selectedDay] = '';
      }
    },
  },
};
</script>

<style scoped>
.notes textarea {
  width: 100%;
  height: 100px;
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 10px;
  margin-bottom: 10px;
}

.notes-actions {
  display: flex;
  gap: 10px;
}

.save-button {
  background-color: #28a745;
  color: #fff;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
}

.clear-button {
  background-color: #dc3545;
  color: #fff;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
}
</style>