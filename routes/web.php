<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Inertia\Inertia;
use App\Http\Controllers\CourseController;
use App\Models\Course;

/*
|--------------------------------------------------------------------------
| Rotas Web
|--------------------------------------------------------------------------
|
| Este arquivo foi ajustado para remover os endpoints de API e utilizar
| apenas os controllers padrão do Laravel (RegisteredUserController e
| AuthenticatedSessionController) para o fluxo de registro e login.
|
*/

// Página inicial ANTES do login (Prelogin.vue)
Route::get('/', function () {
  return Inertia::render('Prelogin'); // Mantém a página inicial antes do login
})->name('prelogin');

// Rotas de autenticação (Login)
// Utilizando o AuthenticatedSessionController para login, sem chamadas à API.
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name(
  'login'
);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Rotas de registro
Route::get('/register', [RegisteredUserController::class, 'create'])->name(
  'register'
);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Rota para deslogar
Route::middleware('auth')
  ->post('/logout', [AuthenticatedSessionController::class, 'destroy'])
  ->name('logout');

// Esqueci minha senha
Route::get('/forgot-password', function () {
  return Inertia::render('Auth/ForgotPassword');
})->name('password.request');

// Rotas protegidas (somente usuários autenticados podem acessar)

Route::middleware('auth')->group(function () {

  // Dashboard: envia os cursos inscritos do usuário para o Inertia
  Route::get('/dashboard', function () {
    $user = auth()->user();
    $courses = $user->courses()->get();
    return Inertia::render('Dashboard', [
      'courses' => $courses,
    ]);
  })->name('dashboard');

 // Nova rota para desinscrever
    Route::post('/courses/{id}/unenroll', [CourseController::class, 'unenroll'])
        ->middleware('auth')
        ->name('courses.unenroll');
});

  // Rota para a Tela de Pesquisa (SearchScreen)
  Route::get('/search', function () {
    return Inertia::render('SearchScreen');
  })->name('search');

  // Rota para Comunidade: mantém a rota correta para entrar na comunidade
  Route::get('/community/{id}', function ($id) {
    $course = Course::findOrFail($id); // Busca o curso pelo ID ou retorna erro 404
    return Inertia::render('CommunityPage', ['course' => $course]);
  })->name('community.show');

  // Perfil do usuário
  Route::get('/profile', [ProfileController::class, 'edit'])->name(
    'profile.edit'
  );
  Route::put('/profile', [ProfileController::class, 'update'])->name(
    'profile.update'
  );
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
    'profile.destroy'
  );

  // Se a rota de verificação de inscrição não for necessária, pode ser removida.
  // Route::middleware('auth:sanctum')->get('/user/enrollment', [AuthController::class, 'checkEnrollment']);

// Página Sobre Nós
Route::get('/about', function () {
  return Inertia::render('About');
})->name('about');

Route::middleware('auth')->group(function () {
  // Rota para verificar se o usuário já está inscrito
  Route::get('/courses/{id}/is-enrolled', [
    CourseController::class,
    'isEnrolled',
  ])->middleware('auth');

  // Rota para inscrever o usuário no curso
  Route::post('/courses/{id}/enroll', [CourseController::class, 'enroll'])
    ->middleware('auth')
    ->name('courses.enroll');
});
