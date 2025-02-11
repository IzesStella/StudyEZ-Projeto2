<template>
    <div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="/images/zizi.png" alt="StudyEZ Logo" class="logo small-logo" />
        <nav>
        <button class="nav-button home-button">🏠</button>
        <button class="nav-button grid-button">➕</button>
        </nav>
        <div class="profile-section" @click="goToProfile">
        <img src="/images/profile-icon.png" alt="User Profile" class="profile-icon" />
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Olá! O que você deseja aprender hoje?</h1>

        <!-- Center Card -->
    <!-- <div class="center-card">
        <p>Parece que você ainda não está inscrito em nenhuma disciplina.</p>
        <p>Explore as disciplinas disponíveis!</p>
        <button class="btn explore-button">Explorar</button>
    </div> -->

        <!-- Planner Section -->
        <div class="planner-section">
        <div class="planner-right">
            <div class="calendar">
            <h2>Janeiro</h2>
            <div class="calendar-grid">
                <div v-for="day in days" :key="day" class="calendar-day" @click="selectDay(day)" :class="{'selected': selectedDay === day}">
                {{ day }}
                </div>
            </div>
            </div>
            <div class="notes">
            <h3>Atividades {{ selectedDay }} de Janeiro de 2025:</h3>
            <textarea v-model="notes[selectedDay]" placeholder="Adicione suas anotações aqui..."></textarea>
            <div class="notes-actions">
                <button class="btn save-button" @click="saveNotes">Salvar</button>
                <button class="btn clear-button" @click="clearNotes">Limpar</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    data() {
    return {
        days: Array.from({ length: 31 }, (_, i) => i + 1),
        selectedDay: null,
        notes: {}
    };
    },
    methods: {
    selectDay(day) {
        this.selectedDay = day;
    },
    saveNotes() {
        alert('Anotações salvas!');
    },
    clearNotes() {
        if (this.selectedDay) {
        this.notes[this.selectedDay] = '';
        }
    },
    goToProfile() {
        
        alert('Indo para o perfil...');
    }
    }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

.dashboard-container {
    display: flex;
    height: 100vh;
    overflow: hidden;
}

.sidebar {
    width: 100px;
    background-color: #fdf5cc;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 0;
    border-right: 1px solid #e0e0e0;
    margin-left: 30px;
    margin-top: 15px;
    margin-bottom: 15px;
    border-radius: 12px;
    position: fixed;
    height: calc(100% - 30px);
}

.small-logo {
    width: 80px;
}

.nav {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.nav-button {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    margin: 15px 0;
    color: #555;
}

.nav-button:hover {
    color: #000;
}

.profile-section {
    margin-top: auto;
    cursor: pointer;
}

.profile-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: 2px solid #ccc;
}

.main-content {
    flex: 1;
    margin-left: 130px;
    padding: 20px;
    text-align: left;
    overflow-y: auto;
    height: 100vh;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

h1 {
    font-family: 'Montserrat', sans-serif;
    font-size: 24px;
    font-weight: bold;
}

/*
.center-card {
    background-color: #d9f8ff;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 60%;
    margin: 0 auto;
} 
    */


.center-card p {
    font-size: 16px;
    margin: 10px 0;
}

.explore-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
}

.explore-button:hover {
    background-color: #0056b3;
}

.planner-section {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 20px;
    margin-top: 20px;
}

.planner-right {
    width: 40%;
}

.calendar {
    background-color: #fdf5cc;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.calendar h2 {
    text-align: center;
    font-size: 18px;
    margin-bottom: 10px;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 10px;
}

.calendar-day {
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
    border-radius: 4px;
    cursor: pointer;
}

.calendar-day.selected {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
}

.notes {
    background-color: #fdf5cc;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.notes textarea {
    width: 100%;
    height: 100px;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px;
    font-size: 14px;
    margin-bottom: 10px;
    resize: none;
}

.notes-actions {
    display: flex;
    gap: 10px;
}

.save-button {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
}

.save-button:hover {
    background-color: #1e7e34;
}

.clear-button {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
}

.clear-button:hover {
    background-color: #c82333;
}
</style>