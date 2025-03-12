<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class CourseController extends Controller
{
  /**
   * Exibir todos os cursos
   */
  public function index()
  {
    $courses = Course::all();
    return view('courses.index', compact('courses'));
  }

  /**
   * Exibir um curso específico
   */
  public function show($id)
  {
    $course = Course::findOrFail($id);
    return view('courses.show', compact('course'));
  }

  /**
   * Verifica se o usuário está inscrito no curso
   */
  public function isEnrolled($id)
  {
    $user = Auth::user();
    if (!$user) {
      return response()->json(['enrolled' => false], 200);
    }

    $enrolled = $user->courses()->where('courses_id', $id)->exists();
    return response()->json(['enrolled' => $enrolled]);
  }

  /**
   * Inscrever o usuário no curso
   */
  public function enroll($id)
  {
    if (!Auth::check()) {
      return response()->json(['error' => 'Usuário não autenticado.'], 401);
    }

    $user = Auth::user();
    $course = Course::find($id);
    
    if (!$course) {
      return response()->json(['error' => 'Curso não encontrado.'], 404);
    }

    if ($user->courses()->where('courses_id', $id)->exists()) {
      return response()->json(
        ['error' => 'Você já está inscrito neste curso!'],
        400
      );
    }

    $user->courses()->attach($id);
    return response()->json(['success' => 'Inscrição realizada com sucesso!']);
  }

  /**
   * Desinscrever o usuário do curso (NOVO MÉTODO)
   */
  public function unenroll($id)
  {
    if (!Auth::check()) {
      return response()->json(['error' => 'Usuário não autenticado.'], 401);
    }

    $user = Auth::user();
    $course = Course::find($id);
    
    if (!$course) {
      return response()->json(['error' => 'Curso não encontrado.'], 404);
    }

    if (!$user->courses()->where('courses_id', $id)->exists()) {
      return response()->json(
        ['error' => 'Você não está inscrito neste curso!'],
        400
      );
    }

    $user->courses()->detach($id);
    return response()->json(['success' => 'Desinscrição realizada com sucesso!']);
  }
}