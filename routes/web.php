<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;


// 📌 Página inicial ANTES do login (Prelogin.vue)
Route::get('/', function () {
    return Inertia::render('Prelogin'); // Mantendo a página inicial antes do login
})->name('prelogin');

// 📌 Rotas de autenticação (Login e Cadastro)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// 📌 Rota para registrar um novo usuário
Route::post('/register', [AuthController::class, 'register']);
Route::post('Auth/login', [AuthController::class, 'login']);

// 📌 Rota para deslogar
Route::middleware('auth')->post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// 📌 Esqueci minha senha
Route::get('/forgot-password', function () {
    return Inertia::render('Auth/ForgotPassword');
})->name('password.request');
 

// 📌 Rota para salvar e obter notas
Route::middleware('auth:api')->group(function() {
    Route::post('/notes', [AuthController::class, 'saveNote']); // Para salvar a nota
    Route::get('/notes', [AuthController::class, 'getNotes']);  // Para pegar as notas
});

// 📌 Rotas protegidas (somente usuários autenticados podem acessar)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');


    // 📌 Perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 📌 Página Sobre Nós
Route::get('/sobre', function () {
    return Inertia::render('About'); // Renderiza o componente Vue About.vue
})->name('about');