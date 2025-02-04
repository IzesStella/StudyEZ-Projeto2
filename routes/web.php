<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Página inicial (pré-login)
Route::get('/', function () {
    return Inertia::render('Prelogin'); // Mostra a página inicial antes do login
});

// Rota para o Login
Route::get('/login', function () {
    return Inertia::render('Auth/Login'); 
})->name('login');

// Rota para o Cadastro
Route::get('/register', function () {
    return Inertia::render('Auth/Register');
});

// Rota para esquecimento de senha (opcional)
Route::get('/forgot-password', function () {
    return Inertia::render('Auth/ForgotPassword');
});


/*ESTRUTURA DESEJADA DE ORDEM DE ORGANIZAÇAO (VOU APAGAR ISSO DPS)
resources/
│── js/
│   ├── Pages/
│   │   ├── Prelogin.vue  <-- AQUI!
│   │   ├── Auth/
│   │   │   ├── Login.vue
│   │   │   ├── Register.vue
│   │   │   ├── ForgotPassword.vue
*/