<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Models\Course;

//  Página inicial ANTES do login (Prelogin.vue)
Route::get('/', function () {
    return Inertia::render('Prelogin'); // Mantendo a página inicial antes do login
})->name('prelogin');

//  Rotas de autenticação (Login e Cadastro)
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

// 📌 Rotas protegidas (somente usuários autenticados podem acessar)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // rota para a Tela de Pesquisa (SearchScreen)
    Route::middleware(['auth'])->get('/search', function () {
        return Inertia::render('SearchScreen');
    })->name('search');


    
 // 📌 Nova Rota dinâmica para Comunidade, baseada no ID do curso
 Route::get('/community/{id}', function ($id) {
    $course = Course::findOrFail($id); // Busca o curso pelo ID ou retorna erro 404
    return Inertia::render('CommunityPage', ['course' => $course]);
})->name('community.show');



    //  Perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //  Verificação de inscrição em cursos
    Route::middleware('auth:sanctum')->get('/user/enrollment', [AuthController::class, 'checkEnrollment']);
});

// Página Sobre Nós
Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

// 📌 Rotas para ver todos cursos e um curso específico
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

