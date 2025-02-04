<template>
    <div class="prelogin-container">
        <h1>Bem-vindo(a) ao StudyEZ!</h1>
        <p>Gerencie seus estudos de forma eficiente e produtiva.</p>
        <button @click="goToLogin">Entrar</button>
        <button @click="goToRegister">Cadastrar-se</button>
    </div>
</template>

<script>
import { router } from '@inertiajs/vue3';

export default {
    methods: {
        goToLogin() {
            router.get('/login');
        },
        goToRegister() {
            router.get('/register'); 
        }
    }
};
</script>

<style>
.prelogin-container {
    text-align: center;
    padding: 20px;
}
button {
    margin: 10px;
    padding: 10px 20px;
    cursor: pointer;
}
</style>
