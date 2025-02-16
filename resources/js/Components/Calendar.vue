<template>
    <div class="calendar">
      <Calendar expanded @dayclick="selectDay" />
      <div v-bind:is="selectedDay" class="notes">
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
      selectDay(day) {
        this.selectedDay = day.id;
      },
      saveNotes() {
        alert('Anotações salvas!');
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