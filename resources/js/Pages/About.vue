<template>

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

    <div class="about-container">
      <header class="header">
        <h1>StudyEZ é a plataforma para auxiliar seus estudos! </h1>
        <p>O StudyEZ é uma plataforma de estudos desenvolvida por um grupo de estudantes como 
        projeto das disciplinas de Projeto II e Desenvolvimento Web. Esse site tem como objetivo 
        facilitar a comunicação entre alunos e monitores por meio de comunidades, promovendo um 
        aprendizado acessível e colaborativo.</p>

        <!-- Botão de cadastro -->
  <button class="register-button">CADASTRE-SE</button>
      </header>
  
      <section class="about-content">
        <div class="mission">
          <h2>NOSSO PROPÓSITO</h2>
          <p>
            O site busca transformar a experiência acadêmica, facilitando o aprendizado por meio da conexão entre alunos e monitores em um ambiente colaborativo e organizado.
          </p>
        </div>
  
        <div class="vision">
          <h2>NOSSA PERSONALIDADE</h2>
          <p>
            Valorizamos a troca de conhecimento e a construção de uma comunidade onde todos possam aprender e ensinar, tornando o estudo mais dinâmico e eficiente.
          </p>
        </div>
      </section>
  
      <section class="developers">
  <h2>Desenvolvedores</h2>
  <div class="dev-list">
    <div class="dev-card">
      <img src="/images/github-logo.png" alt="GitHub" class="github-logo" />
      <div>
        <h3>Isabelly Arruda</h3>
        <a href="https://github.com/IsabellyArrudaa" target="_blank">IsabellyArrudaa</a>
      </div>
    </div>

    <div class="dev-card">
      <img src="/images/github-logo.png" alt="GitHub" class="github-logo" />
      <div>
        <h3>Izes Stella</h3>
        <a href="https://github.com/IzesStella" target="_blank">IzesStella</a>
      </div>
    </div>

    <div class="dev-card">
      <img src="/images/github-logo.png" alt="GitHub" class="github-logo" />
      <div>
        <h3>José Vinícius</h3>
        <a href="https://github.com/Vinnijds" target="_blank">Vinnijds</a>
      </div>
    </div>

    <div class="dev-card">
      <img src="/images/github-logo.png" alt="GitHub" class="github-logo" />
      <div>
        <h3>Lucas Souza</h3>
        <a href="https://github.com/lucazle" target="_blank">lucazle</a>
      </div>
    </div>

    <div class="dev-card">
      <img src="/images/github-logo.png" alt="GitHub" class="github-logo" />
      <div>
        <h3>Marcos Antônio</h3>
        <a href="https://github.com/M4rk1n02" target="_blank">M4rk1n02</a>
      </div>
    </div>

    <div class="dev-card">
      <img src="/images/github-logo.png" alt="GitHub" class="github-logo" />
      <div>
        <h3>Mariana Tavares</h3>
        <a href="https://github.com/marianantavares" target="_blank">marianantavares</a>
      </div>
    </div>

    <div class="dev-card">
      <img src="/images/github-logo.png" alt="GitHub" class="github-logo" />
      <div>
        <h3>Talita Vitória</h3>
        <a href="https://github.com/Talitavit" target="_blank">Talitavit</a>
      </div>
    </div>
  </div>
     </section>
    </div>
</template>
  
<style scoped>

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

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


/* 📌 Estilos Gerais */
.about-container {
  text-align: center;
  padding: 40px;
  background: url('/images/zizi-opacidade.png') no-repeat center center;
  background-size: contain; 
  background-position: center;
  background-attachment: fixed; 
  color: #333;
  max-width: 1000px;
  margin: auto;
  font-family: 'Montserrat', sans-serif;
}


/* 📌 Cabeçalho */
.header h1 {
  font-size: 25px; 
  font-weight: bold; 
  color: #305B7B; 
  margin-bottom: 10px;
}

.header p {
  font-size: 15px;
  color: #000000;
  font-weight: bold;
  max-width: 900px;
}

/* 📌 Botão */
.register-button {
  background-color: #c1e1ff;
  color: rgb(0, 0, 0);
  font-size: 15px;
  font-weight: bold;
  padding: 15px 24px;
  border: none;
  border-radius: 15px;
  cursor: pointer;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
  margin-top: 5%;
}

/* 📌 Seção de Missão e Visão */
.about-content {
  display: flex;
  justify-content: center;
  gap: 40px;
  margin: 40px 0;
  gap: 60px;
  margin: 60px 0;
}

.mission, .vision {
  background: white;
  padding: 20px;
  border-radius: 10px;
  width: 40%;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
  border: 2px solid #305B7B;
  width: 40%;
}

.mission p, .vision p {
  font-size: 13px;
  margin-top: 10px;
}

h2 {
  color: #000000; 
  font-weight: bold; 
}

/* 📌 Seção dos Desenvolvedores */
.developers h2{
  text-align: center;
  font-size: 25px;
  color: #305B7B; 
}

.dev-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  color: #000000;
  margin-top: 10px;
}

.dev-card {
  display: flex;
  align-items: center;
  gap: 10px;
  text-align: left;
  font-size: 14px;
  
}

.github-logo {
  width: 35px;
  height: 35px;
}

a {
  text-decoration: none;
  color: #000000;
  font-size: 10px;
}

a:hover {
  text-decoration: underline;
}

/* 📌 Responsividade */
@media (max-width: 1024px) {
  .about-container {
    padding: 20px;
    max-width: 90%;
  }

  .about-content {
    flex-direction: column;
    gap: 20px;
  }

  .mission, .vision {
    width: 100%;
  }

  .sidebar {
    width: 80px;
    padding: 10px 0;
  }

  .small-logo {
    width: 60px;
  }

  .nav-button {
    width: 40px;
    height: 40px;
    font-size: 1.2rem;
  }
}

@media (max-width: 768px) {
  .sidebar {
    width: 60px;
    padding: 5px 0;
  }

  .small-logo {
    width: 50px;
  }

  .nav-button {
    width: 35px;
    height: 35px;
    font-size: 1rem;
  }

  .about-container {
    padding: 15px;
    max-width: 100%;
  }

  .header h1 {
    font-size: 20px;
  }

  .header p {
    font-size: 14px;
  }

  .register-button {
    font-size: 13px;
    padding: 12px 20px;
  }

  .dev-list {
    flex-direction: column;
    align-items: center;
  }

  .dev-card {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
}

@media (max-width: 480px) {
  .sidebar {
    display: none; /* Esconde completamente a barra lateral não esta funcionando (?)*/
  }

  .about-container {
    padding: 10px;
  }

  .header h1 {
    font-size: 18px;
  }

  .header p {
    font-size: 12px;
  }

  .register-button {
    font-size: 12px;
    padding: 10px 16px;
  }

  .developers h2 {
    font-size: 20px;
  }
}

</style>
