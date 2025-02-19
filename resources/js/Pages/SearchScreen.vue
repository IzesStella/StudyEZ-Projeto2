    <template>
        <div class="prelogin-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <img src="/images/zizi.png" alt="StudyEZ Logo" class="logo small-logo" />
            <nav>
                <button class="nav-button" @click="goToHome">
                        <font-awesome-icon icon="home" style="color: #CE9E10;" />
                    </button>
                    <button class="nav-button" style="color: #3885A7;" @click="goToSearch">
                        <font-awesome-icon icon="plus" />
                    </button>
            </nav>
            <div class="profile-section" @click="goToProfile">
            <img src="/images/profile-icon.png" alt="User Profile" class="profile-icon" />
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar with Search -->
            <div class="top-bar">
            <input type="text" placeholder="Pesquisar..." class="search-bar" />
            </div>

            <!-- Cards Section -->
            <section class="disciplinas">
            <h2>Conheça novas disciplinas:</h2>
            <div class="disciplinas-grid">
                <div class="disciplina-card" style="background-color: #d9f8c4;">
                <img src="/images/logic-icon.png" alt="Disciplina" class="disciplina-icon" />
                <h3>Lógica de Programação</h3>
                <p>Base conceitual sobre temas básicos e avançados de lógica de programação, ideal para iniciantes e profissionais.</p>
                <button class="btn inscrever-button">INSCREVER-SE</button>
                </div>
                <div class="disciplina-card" style="background-color: #c4f0f8;">
                <img src="/images/logic-icon.png" alt="Disciplina" class="disciplina-icon" />
                <h3>Lógica de Programação</h3>
                <p>Base conceitual sobre temas básicos e avançados de lógica de programação, ideal para iniciantes e profissionais.</p>
                <button class="btn inscrever-button">INSCREVER-SE</button>
                </div>
                <div class="disciplina-card" style="background-color: #e3d9f8;">
                <img src="/images/logic-icon.png" alt="Disciplina" class="disciplina-icon" />
                <h3>Lógica de Programação</h3>
                <p>Base conceitual sobre temas básicos e avançados de lógica de programação, ideal para iniciantes e profissionais.</p>
                <button class="btn inscrever-button">INSCREVER-SE</button>
                </div>
                <div class="disciplina-card" style="background-color: #f8d9d9;">
                <img src="/images/logic-icon.png" alt="Disciplina" class="disciplina-icon" />
                <h3>Lógica de Programação</h3>
                <p>Base conceitual sobre temas básicos e avançados de lógica de programação, ideal para iniciantes e profissionais.</p>
                <button class="btn inscrever-button">INSCREVER-SE</button>
                </div>
                <div class="disciplina-card" style="background-color: #fff2d4;">
                <img src="/images/logic-icon.png" alt="Disciplina" class="disciplina-icon" />
                <h3>Lógica de Programação</h3>
                <p>Base conceitual sobre temas básicos e avançados de lógica de programação, ideal para iniciantes e profissionais.</p>
                <button class="btn inscrever-button">INSCREVER-SE</button>
                </div>
                <div class="disciplina-card" style="background-color: #f8d4e4;">
                <img src="/images/logic-icon.png" alt="Disciplina" class="disciplina-icon" />
                <h3>Lógica de Programação</h3>
                <p>Base conceitual sobre temas básicos e avançados de lógica de programação, ideal para iniciantes e profissionais.</p>
                <button class="btn inscrever-button">INSCREVER-SE</button>
                </div>
            </div>
            </section>
        </div>
        </div>
    </template>

    <script>
    import { router, usePage } from '@inertiajs/vue3';
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

    export default {
        components: {
            FontAwesomeIcon
        },
        data() {
            return {
                disciplinas: [
                    { nome: "Lógica de Programação", descricao: "Base conceitual sobre lógica de programação.", cor: "#d9f8c4" },
                    { nome: "Estruturas de Dados", descricao: "Aprenda sobre listas, filas e árvores.", cor: "#c4f0f8" },
                    { nome: "Banco de Dados", descricao: "Fundamentos sobre modelagem e SQL.", cor: "#e3d9f8" },
                    { nome: "Desenvolvimento Web", descricao: "HTML, CSS e JavaScript para Web.", cor: "#f8d9d9" },
                    { nome: "Machine Learning", descricao: "Conceitos de IA e aprendizado de máquina.", cor: "#fff2d4" },
                    { nome: "Redes de Computadores", descricao: "Protocolos, segurança e conexões.", cor: "#f8d4e4" }
                ]
            };
        },
        methods: {
            goToProfile() {
                router.get('/profile');
            },
            goToHome() {
                router.get('/dashboard');
            },
            goToSearch() {
                router.get('/search');
            }
        }
    };
    </script>

    <style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

    .searchscreen-container {
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
        padding-bottom: 20px;
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
        text-align: center;
        overflow-y: auto;
        height: 100vh;
        box-sizing: border-box;
    }

    .top-bar {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 10px 30px;
        font-family: 'Montserrat', sans-serif;
        background: white;
        z-index: 1000;
    }

    .search-bar {
        width: 60%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 20px;
        outline: none;
    }

    .disciplinas {
        margin-top: 20px;
    }

    .disciplinas-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 20px;
    }

    .disciplina-card {
        background-color: #f9f9f9;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .disciplina-card img {
        width: 50px;
        margin-bottom: 10px;
    }

    .disciplina-card h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .disciplina-card p {
        font-size: 14px;
        margin-bottom: 15px;
    }

    .inscrever-button {
        background-color: #b3d8ff;
        color: #000;
        font-weight: bold;
        border-radius: 10px;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
    </style>
