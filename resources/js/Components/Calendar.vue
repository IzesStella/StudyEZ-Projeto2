<template>
  <div class="planner-wrapper">
    <div class="planner-container">
      <!-- Calendário -->
      <div class="calendar-container">
        <Calendar
          expanded
          @dayclick="selectDay"
          class="custom-calendar"
        />
      </div>

      <!-- Anotações -->
      <div class="notes-container">
        <h3>Anotações:</h3>
        <textarea
          v-model="notes[selectedDay]"
          placeholder="Adicione suas anotações aqui..."
        ></textarea>
        <div class="notes-actions">
          <button class="btn save-button" @click="saveNotes">Salvar</button>
          <button class="btn clear-button" @click="clearNotes">Limpar</button>
        </div>
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
    Authorization: `Bearer ${localStorage.getItem('token')}`,
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
        console.error('Erro ao carregar anotações:', error.response?.data || error);
      }
    },
    async saveNotes() {
      try {
        const response = await apiClient.post('/notes', {
          date: this.selectedDay,
          content: this.notes[this.selectedDay],
        });
        console.log('Resposta do backend:', response.data);
        alert('Anotações salvas com sucesso!');
      } catch (error) {
        console.error('Erro ao salvar anotações:', error.response?.data || error);
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

/* Container geral para centralizar na tela */
.planner-wrapper {
  display: flex;
  justify-content: center; 
  margin-top: 30px;      
}

/* Container que envolve calendário e notas*/
.planner-container { 

  border-radius: 20px;
  width: 450px;             
  padding: 20px;
}

/* Container do calendário (fundo branco, cantos arredondados) */
.calendar-container {
  background-color: #ffffff;
  border-radius: 15px;
  padding: 20px;
  margin-bottom: 20px;
}

/* Container das anotações */
.notes-container {
  margin-top: 10px;
}

.notes-container h3 { /*esse é a distancia de anotações para o container de anotaçoes*/
  margin-bottom: 10px;
}

/* Textarea de anotações */
.notes-container textarea {
  width: 100%;
  height: 150px;
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 10px;
  resize: none;             /* Desabilita o redimensionamento manual */
  background-color: #fff;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

/* Container para os botões */
.notes-actions {
  display: flex;
  justify-content: center;  /* Centraliza os botões */
  gap: 15px;
  margin-top: 10px;
}

/* Botão Salvar */
.save-button {
  background-color: #4AB4D8; 
  color: #000000;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
  border: none;
  font-weight: 500;
}

/* Botão Limpar */
.clear-button {
  background-color: #4AB4D8; 
  color: #000000;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
  border: none;
  font-weight: 500;
}
</style>
