  <template>
    <div class="prelogin-container">
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
      </div>

      <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
          <div class="auth-options">
            <p>Não tem uma conta ainda?</p>
            <button @click="goToRegister" class="btn secondary">CADASTRE-SE</button>
          </div>
          <div class="auth-options">
            <p>Já é cadastrado?</p>
            <button @click="goToLogin" class="btn primary">ENTRAR</button>
          </div>
        </div>

        <!-- Banner -->
        <div class="banner">
          <img src="/images/bannercoruja.jpg" alt="Banner StudyEZ" class="banner-image" />
        </div>

        <section class="comunidades">
        <h2>NOSSAS COMUNIDADES</h2>
        <div class="comunidades-grid">

      <div class="comunidade-card logica de peogramação "style="background-color: #DABEE9;">
        <div class="comunidade-header">
          <img src="logica.jpg" class="perfil-img">
          <h3>Lógica de Programação</h3>
        </div>
        <p>Essa comunidade foca em conceitos básicos e avançados de lógica de programação.</p>
        <button class="btn join-button">UNIR-SE</button>
      </div>

      <div class="comunidade-card desenvolvimento-web" style="background-color: #b0d4f2;">
        <div class="comunidade-header">
          <img src="web.jpg" class="perfil-img">
          <h3>Desenvolvimento Web</h3>
        </div>
        <p>Aprenda sobre criação de sites e aplicações modernas.</p>
        <button class="btn join-button">UNIR-SE</button>
      </div>

      <div class="comunidade-card banco-dados" style="background-color: #DABEE9;">
        <div class="comunidade-header">
          <img src="banco.jpg" class="perfil-img">
          <h3>Banco de Dados</h3>
        </div>
        <p>Explore conceitos de modelagem e gerenciamento de dados.</p>
        <button class="btn join-button">UNIR-SE</button>
      </div>

      <div class="comunidade-card inteligencia-artificial" style="background-color: #E5E17F;">
        <div class="comunidade-header">
          <img src="ia.jpg" class="perfil-img">
          <h3>Inteligência Artificial</h3>
        </div>
        <p>Descubra técnicas de machine learning e redes neurais.</p>
        <button class="btn join-button">UNIR-SE</button>
      </div>

      <div class="comunidade-card redes-computadores" style="background-color: #F7BDE0;">
        <div class="comunidade-header">
          <img src="images/redes.jpg" class="perfil-img">
          <h3>Redes de Computadores</h3>
        </div>
        <p>Entenda como funcionam as redes e a segurança da informação.</p>
        <button class="btn join-button">UNIR-SE</button>
      </div>

      <div class="comunidade-card engenharia-software" style="background-color: #FFC384;">
        <div class="comunidade-header">
          <img src="images/engenhariasoftware.png" class="perfil-img">
          <h3>Engenharia de Software</h3>
        </div>
        <p>Aprenda sobre design, arquitetura e ciclo de vida do software.</p>
        <button class="btn join-button">UNIR-SE</button>
      </div>

    </div>
  </section>



        <!-- FAQ -->
        <section class="faq">
          <h2>FAQ - COMO FUNCIONA NOSSO SITE?</h2>
          <div class="faq-item">
            <h3>O QUE É O STUDYEZ?</h3>
            <p>O StudyEZ é uma plataforma de monitorias online onde alunos podem receber ajuda em diversas matérias, tirar dúvidas e organizar seus estudos de forma eficiente.</p>
          </div>

          <div class="faq-item">
            <h3>COMO POSSO ENCONTRAR UMA MONITORIA?</h3>
            <p>Você pode navegar pelas comunidades e se unir a elas. Cada comunidade possui um título com a matéria relacionada, uma <br> breve descrição e um botão para saber mais e dentro dela tem o espaço de perguntas e respostas.</p>
          </div>

          <div class="faq-item">
            <h3>O QUE É O PLANNER DO SITE?</h3>
            <p>O planner é uma ferramenta integrada ao aplicativo que permite organizar seus estudos. Você pode anotar tarefas e adicionar lembretes diários.</p>
          </div>
        </section>
        <button class="footer-btn" @click="goToAbout">SOBRE NÓS</button>  
      </div>

    </div>
  </template>

  <script>

  import { router } from '@inertiajs/vue3';

  export default {
    name: 'Prelogin',
    methods: {
      goToLogin() {
        router.get('/login');
      },
      goToRegister() {
        router.get('/register');
      },
      goToAbout() {
        router.get('/about');
      }
    }
  };
  </script>

  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

  .prelogin-container {
    display: flex;
    flex-direction: column;
    height: 100vh;
    overflow: auto;
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
    width: 100%; 
    background-color: white;
    z-index: 900; /* Garante que fique sobre os outros elementos */
    display: flex;
    justify-content: center;
    padding: 15px 0; 
    gap: 25px;
    font-size: 120%;
  }



  .auth-options {
    display: flex;
    align-items: center;
    gap: 15px;
    font-weight: bold;
    font-size: 120%;
    margin: 0 auto;
  }

  .auth-options p {
    font-size: 90%; 
    margin: 0; 
  }


  .btn {
    font-family: 'Montserrat', sans-serif;
    border: none;
    padding: 10px 20px;
    font-size: 15px;
    border-radius: 15px;
    cursor: pointer;
    background-color: #c1e1ff;
    color: #000000;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  }

  .btn:hover {
    transform: translateY(-2px);
  }

  .banner {
    top: 80px; 
    z-index: 1000; 
  }

  .banner-image {
    max-width: 90%;
    height: auto;
    display: block;
    margin: 0 auto;
    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    object-fit: cover;
  }

  .comunidades {
    margin-top: 40px;
    text-align: center;
  }
  .comunidades h2 {
    font-size: 26px; 
    font-weight: bold; /* Negrito */
    color: #000000;
    margin-bottom: 20px;
    font-family: 'Montserrat', sans-serif;
  }
  .comunidades-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    justify-content: center;
    padding: 0 20px;
  }
  .comunidade-header {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .comunidade-card {
    background-color: #f9f9f9;
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    width: 80%;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    position: relative;
    height: 200px;
    margin: 0 auto; 
    justify-content: space-between;
    flex-direction: column;
    font-family: 'Montserrat', sans-serif; 
    transition: transform 0.3s ease-in-out;
  }

  .comunidade-card:hover {
    transform: translateY(-5px);
  }

  .comunidade-card h3 {
    font-size: 18px;
    margin-bottom: 10px;
  }

  .comunidade-card p {
    margin-top: auto; 
    font-size: 14px;
    margin-bottom: 15px;
    color: #000000;
    font-size: 1rem;
    line-height: 1.5;
    text-align: justify;
  }

  .comunidade-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px; /* Aumentei o espaço para afastar do texto */
  }

  .perfil-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
  }

  h3 {
    font-size: 16px;
    font-weight: bold;
  }
  p {
    font-size: 14px;
  }

  .join-button {
    position: absolute;
    margin-top: 20px;
    bottom: 10px;
    right: 10px;
    background-color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    border: none;
    font-family: 'Montserrat', sans-serif;
    padding: 5px 15px;
  }
  .join-button:hover {
    background-color:#b3d8ff;
  }

  .faq {
    padding: 40px 20px;
    width: 80%;
    margin: 0 auto;    /* Centraliza o bloco, mas mantém o texto alinhado à esquerda */
    font-family: 'Montserrat', sans-serif;
  }

  .faq h2 {
    font-size: 1.5rem;
    margin-bottom: 40px;
    color: #000;
    font-weight: bold;
    width: 80%;
    text-align: left;
  }

  .faq-item {
    margin-bottom: 30px;
  }
  .faq-item h3 {
    font-size: 1.2rem;
    font-weight: bold;  
    color: #000;
    margin-bottom: 10px;  /* Espaço entre o título e o texto */
    text-align: left;
  
  }
  .faq-item p {
    font-size: 1rem;
    color: #333;
    line-height: 1.6;
    margin-left: 0;
    text-align: left;  
  }

  .footer-btn { 
    display: block;
    margin-top: 10px;
    margin: auto;
    padding: 10px 30px; /*tamanho do botao*/
    cursor: pointer;
    background-color: #b3d8ff;
    border-radius: 15px;
    font-size: 20px;
    font-weight: bold;
    color: rgb(0, 0, 0);
    font-family: 'Montserrat', sans-serif;
    border: none; 
  }

  .footer-btn:hover {
    background-color: #91c4ff; 
  }
  @media (max-width: 1024px) {
  .sidebar {
    width: 70px;
    padding: 10px 0;
  }

  .small-logo {
    width: 60px;
  }

  .main-content {
    margin-left: 90px;
  }

  .comunidades-grid {
    grid-template-columns: repeat(2, 1fr); /* Duas colunas para telas médias */
  }

  .top-bar {
    flex-direction: column;
    gap: 10px;
    padding: 10px;
  }

  .auth-options {
    flex-direction: column;
    gap: 5px;
  }
}

@media (max-width: 768px) {
  .sidebar {
    display: none; /* Oculta a sidebar em telas muito pequenas */
  }
  .main-content {
    margin-left: 0;
    padding: 10px;
  }

  .comunidade-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-radius: 12px;
        width: 100%;
        min-height: 100px; 
        position: relative;
    }

  .comunidades-grid {
    grid-template-columns: 1fr; /* Apenas uma coluna */
  }

  .banner-image {
    max-width: 100%;
    height: auto;
  }

  .join-button {
        width: 90%;
        max-width: 200px;
        padding: 10px;
        border-radius: 20px;
        background-color: white;
        border: none;
        position: relative;
        margin-top: auto;
    }

  .faq, .comunidades {
    width: 100%;
    padding: 20px;
  }

  .footer-btn {
    width: 90%;
    font-size: 18px;
  }
}


  </style>
