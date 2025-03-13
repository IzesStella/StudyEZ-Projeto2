<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use Inertia\Inertia;
use App\Models\Course;

/* --------------------------- ROTAS PÚBLICAS --------------------------- */
Route::get('/', function () {
    return Inertia::render('Prelogin');
})->name('prelogin');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

/* ----------------------- ROTAS DE AUTENTICAÇÃO ------------------------- */
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    
    // Registro
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    
    // Recuperação de senha
    Route::get('/forgot-password', function () {
        return Inertia::render('Auth/ForgotPassword');
    })->name('password.request');
});

/* ----------------------- ROTAS PROTEGIDAS (Auth) ------------------------ */
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'courses' => auth()->user()->courses
        ]);
    })->name('dashboard');

    // Pesquisa
    Route::get('/search', function () {
        return Inertia::render('SearchScreen');
    })->name('search');

    // Comunidade
    Route::get('/community/{id}', function ($id) {
        return Inertia::render('CommunityPage', [
            'course' => Course::findOrFail($id)
        ]);
    })->name('community.show');

    // Perfil do Usuário
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Gestão de Cursos
    Route::prefix('courses')->group(function () {
        // Verificar inscrição
        Route::get('/{id}/is-enrolled', [CourseController::class, 'isEnrolled']);
        
        // Inscrever
        Route::post('/{id}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
        
        // Desinscrever (ROTA CORRIGIDA)
        Route::post('/{id}/unenroll', [CourseController::class, 'unenroll'])->name('courses.unenroll');
    });
});