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
          <h2>Nosso Propósito</h2>
          <p>
            O site busca transformar a experiência acadêmica, facilitando o aprendizado por meio da conexão entre alunos e monitores em um ambiente colaborativo e organizado.
          </p>
        </div>
  
        <div class="vision">
          <h2>Nossa Personalidade</h2>
          <p>
            Valorizamos a troca de conhecimento e a construção de uma comunidade onde todos possam aprender e ensinar, tornando o estudo mais dinâmico e eficiente.
          </p>
        </div>
      </section>
  
      <section class="developers">
        <h2>Desenvolvedores</h2>
        <div class="dev-list">
          <div class="dev-card" v-for="dev in developers" :key="dev.name">
            <img :src="dev.image" :alt="dev.name" />
            <h3>{{ dev.name }}</h3>
          </div>
        </div>
      </section>
    </div>
</template>
  
<script>
export default {
  data() {
    return {
      developers: [
        { name: "Isabelly Arruda", image: "/images/isabelly.png" },
        { name: "Izes Stella", image: "/images/izes.png" },
        { name: "José Vinícius", image: "/images/jose.png" },
        { name: "Lucas Souza", image: "/images/lucas.png" },
        { name: "Marcos Antônio", image: "/images/marcos.png" },
        { name: "Mariana Tavares", image: "/images/mariana.png" },
        { name: "Talita Vitória", image: "/images/talita.png" },
      ],
    };
  },
};
</script>
  
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

.register-button {
  background-color: #c1e1ff; /* Azul claro */
  color: rgb(0, 0, 0);
  font-size: 15px;
  font-weight: bold;
  padding: 15px 24px;
  border: none;
  border-radius: 15px;
  cursor: pointer;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
  margin-top: 30px;
}

/* 📌 Seção de Missão e Visão */
.about-content {
  display: flex;
  justify-content: center;
  gap: 40px;
  margin: 40px 0;
   gap: 60px; /* Aumenta o espaço entre os blocos */
  margin: 60px 0;
}

.mission, .vision {
  background: white;
  padding: 20px;
  border-radius: 10px;
  width: 40%;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
  border: 1px solid #305B7B;
  width: 40%;
}

.mission p, .vision p {
  font-size: 13px;
  margin-top: 10px;
}

h2 {
  color: #305B7B; 
  font-weight: bold; 
}

/* 📌 Seção dos Desenvolvedores */
.developers {
  margin-top: 50px; /* Reduzindo o espaço acima */
  text-align: center;
  font-size: 18px; /* Diminuindo o tamanho do título */
}

.dev-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px; /* Reduzindo o espaço entre os cards */
  max-width: 500px; /* Diminuindo a largura */
  margin: auto;
  font-size: 10px;
}

.dev-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 80px; /* Reduzindo o tamanho do card */
  text-align: center;
}

.dev-card img {
  width: 40px; /* Diminuindo a imagem */
  height: 40px;
  border-radius: 50%;
}

.dev-card h3 {
  font-size: 8px; /* Diminuindo o tamanho da fonte */
  margin-top: 3px; /* Reduzindo o espaçamento */
}


</style>
