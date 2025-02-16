<template>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <img src="/images/zizi.png" alt="StudyEZ Logo" class="logo small-logo" />
            <nav>
              <button class="nav-button">
              <font-awesome-icon icon="home" style="color: #CE9E10;" />
            </button>
            <button class="nav-button" style="color: #3885A7;">
              <font-awesome-icon icon="plus" />
            </button>
            </nav>
    
            <div class="profile-section" @click="goToProfile">
            <img src="/images/profile-icon.png" alt="User Profile" class="profile-icon" />
            </div>   
        </div>
    
        <!-- Main Content -->
        <div class="main-content">
            <h1>Olá! O que você deseja aprender hoje?</h1>
            <!-- Center Card -->
            <div class = "aside">    
                <!-- Center Card (ao lado da Sidebar) -->
                <div class="center-card">
                    <p>Parece que você ainda não está inscrito em nenhuma disciplina.</p>
                    <p>Explore as disciplinas disponíveis!</p>
                    <button class="btn explore-button">Explorar</button>
                </div>
    
                <!-- Planner Section -->
                <div class="planner-section">
                    <div class="planner-right">
                        <div class="calendar">
                            <Calendar/>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</template>
    
<script>
    
    import { router } from '@inertiajs/vue3';
    import Calendar from '@/Components/Calendar.vue';
    
    export default {
        methods: {
        goToProfile() {
            router.get('/profile');
        }
        },
        components: {
            Calendar
        },
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
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }
    
    .small-logo {
        width: 80px;
    }
    
    nav {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
    
    .nav-button {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        background-color: #ffffff;
        border: none;
        border-radius: 50%;
        font-size: 1.5rem;
        cursor: pointer;
        margin-bottom: 10px;
        transition: all 0.2s ease-in-out;
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
    
    .aside{
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        width: 100%; /* Ocupará todo o espaço disponível */
        justify-content: space-between; /* Mantém espaçamento adequado */
    }
    
    /* Center Card */
    .center-card {
        background-color: #BAE8FF;
        border-radius: 12px;
        padding: 30px;
        text-align: justify;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        height: fit-content;
        margin-left: 40px;
        display: flex;
        flex-direction: column;
        align-items:  flex-end;
    }
    
    .center-card p {
        font-size: 16px;
        text-align: justify; /* Justifica o texto */
        margin: 10px 0;
        width: 100%; /* Garante que ocupe toda a largura do card */
    }
    
    .explore-button {
        background-color: #FFFFFF;
        color: #0a60e0;
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
        align-items: flex-start; /* Alinha à esquerda */
        gap: 20px;
        width: 100%; /* Garante que ocupe todo o espaço disponível */
        max-width: 600px; /* Ajuste conforme necessário */
    }
    
    .planner-right {
        width: 100%; /* Faz o planner ocupar todo o espaço disponível */
        min-width: 500px; /* Evita que fique muito pequeno */
    }
    .calendar {
        background-color: #fdf5cc;
        padding: 20px;
        border-radius: 12px;
    }
    
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
    }
    
    
</style>
    