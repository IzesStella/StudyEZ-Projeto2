<template>
  <div class="tela">
    <div class="caixa">
      <!-- Lado esquerdo (imagem) -->
      <div class="lado-esquerdo">
        <img src="/images/CorujaSEMFUNDO.png" alt="Coruja" class="coruja" />
      </div>

      <!-- Lado direito (formulário) -->
      <div class="lado-direito">
        <h2 class="titulo">Login</h2>
        <form @submit.prevent="login">
          <div class="campo">
            <label class="label">E-mail</label>
            <div class="input-box">
              <span class="icone">📧</span>
              <!-- icone dentro da caixinha de formulario -->
              <input
                type="email"
                v-model="form.email"
                placeholder="E-mail"
                class="input"
              />
            </div>
          </div>

          <div class="campo">
            <label class="label">Senha</label>
            <div class="input-box">
              <span class="icone">🔒</span>
              <input
                type="password"
                v-model="form.password"
                placeholder="Senha"
                class="input"
              />
            </div>
          </div>

          <div class="esqueci">
            <a href="#" class="link">Esqueceu sua senha?</a>
          </div>

          <button type="submit" class="botao">Entrar</button>
        </form>
      </div>
    </div>
  </div>
  <Preloading :show="loading" />
</template>

<script>
import { toast } from 'vue3-toastify';
import Preloading from '@/Components/Utils/Preloading.vue';

export default {
  components: {
    Preloading,
  },
  data() {
    return {
      form: {
        email: '',
        password: '',
      },
      loading: false,
    };
  },
  methods: {
    async login() {
      this.loading = true;
      try {
        const response = await axios.post(
          'http://127.0.0.1:8000/api/login',
          this.form
        );
        localStorage.setItem('token', response.data.token);

        toast.success('Login bem-sucedido!', {
          position: 'top-center',
          duration: 3000,
        });

        this.$inertia.get('/dashboard');
      } catch (error) {
        if (error.response && error.response.status === 422) {
          this.errors = Object.values(error.response.data.errors).flat();
        } else {
          this.errors = ['Ocorreu um erro ao tentar fazer login.'];
        }
        toast.error(this.errors[0], { position: 'top-center', duration: 3000 });
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>

<style scoped>
/* Tela */
.tela {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-color: #ffffff; /*azul do fundo da tela*/
}

/* Caixa branca */
.caixa {
  display: flex;
  background: white;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
  overflow: hidden;
  max-width: 900px;
  width: 90%;
}

/* Lado esquerdo (imagem) */
.lado-esquerdo {
  background: #fff5d1;
  display: flex;
  align-items: center;
  justify-content: center;
  flex: 1;
  padding: 20px;
}

.coruja {
  width: 100%;
  max-width: 100%; /*pra aumentar a coruja*/
}

/* Lado direito (formulário) */
.lado-direito {
  flex: 1;
  padding: 40px;
}

/* Título */
.titulo {
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

/* Campos */
.campo {
  margin-bottom: 15px;
}

.label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  color: #333;
}

.input-box {
  position: relative;
}

.icone {
  position: absolute;
  left: 10px;
  top: 50%;
  transform: translateY(-50%);
  color: #777;
}

.input {
  width: 100%;
  padding: 10px 10px 10px 35px;
  border: 1px solid #ccc;
  border-radius: 5px;
  outline: none;
}

.input:focus {
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}

/* Esqueci minha senha */
.esqueci {
  text-align: right;
  font-size: 12px;
  margin-bottom: 10px;
}

.link {
  color: #333;
  text-decoration: none;
}

.link:hover {
  text-decoration: underline;
}

.botao {
  width: 50%; /* largura do butaum */
  background: #135572;
  color: white;
  padding: 12px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  display: block; /* Garantindo que o botão seja exibido como um bloco */
  margin: 20px auto 0; /* Centralizando o botão */
}

.botao:hover {
  background: #53bbe9;
}

/* aplicacao de responsividae */
@media (max-width: 768px) {
  .caixa {
    flex-direction: column;
    text-align: center;
  }

  .lado-esquerdo {
    order: -1;
    padding: 30px;
  }

  .coruja {
    max-width: 200px; /* Ajustando para telas menores */
  }

  .lado-direito {
    padding: 20px;
  }
}
</style>
