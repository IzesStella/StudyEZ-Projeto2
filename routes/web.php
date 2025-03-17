<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use Inertia\Inertia;
use App\Models\Course;

Route::get('/', function () {
  return Inertia::render('Prelogin');
})->name('prelogin');

Route::get('/about', function () {
  return Inertia::render('About');
})->name('about');

Route::middleware('guest')->group(function () {
  // Login
  Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name(
    'login'
  );
  Route::post('/login', [AuthenticatedSessionController::class, 'store']);

  // Registro
  Route::get('/register', [RegisteredUserController::class, 'create'])->name(
    'register'
  );
  Route::post('/register', [RegisteredUserController::class, 'store']);

  // Recuperação de senha
  Route::get('/forgot-password', function () {
    return Inertia::render('Auth/ForgotPassword');
  })->name('password.request');
});

Route::middleware('auth')->group(function () {
  // Logout
  Route::post('/logout', [
    AuthenticatedSessionController::class,
    'destroy',
  ])->name('logout');

  // Dashboard
  Route::get('/dashboard', function () {
    $user = auth()->user();
    $courses = $user->courses()->get();
    return Inertia::render('Dashboard', [
      'courses' => $courses,
    ]);
  })->name('dashboard');

  // Pesquisa
  Route::get('/search', function () {
    return Inertia::render('SearchScreen');
  })->name('search');

  // Comunidade
  Route::get('/community/{id}', function ($id) {
    $course = Course::with('posts')->findOrFail($id);
    return Inertia::render('CommunityPage', [
      'course' => $course,
      'authUser' => Auth::user(),
    ]);
  })->name('community.show');

  // Perfil do Usuário
  Route::get('/profile', [ProfileController::class, 'edit'])->name(
    'profile.edit'
  );
  Route::put('/profile', [ProfileController::class, 'update'])->name(
    'profile.update'
  );
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
    'profile.destroy'
  );

  // Gestão de Cursos
  Route::prefix('courses')->group(function () {
    // Verificar inscrição
    Route::get('/{id}/is-enrolled', [CourseController::class, 'isEnrolled']);

    // Inscrever
    Route::post('/{id}/enroll', [CourseController::class, 'enroll'])->name(
      'courses.enroll'
    );

    // Desinscrever
    Route::post('/{id}/unenroll', [CourseController::class, 'unenroll'])->name(
      'courses.unenroll'
    );
  });

  // Novas rotas para posts na comunidade
  Route::post('/community/{course}/posts', [
    PostController::class,
    'store',
  ])->name('posts.store');
  Route::put('/community/{course}/posts/{post}', [
    PostController::class,
    'update',
  ])->name('posts.update');
  Route::delete('/community/{course}/posts/{post}', [
    PostController::class,
    'destroy',
  ])->name('posts.destroy');
});
