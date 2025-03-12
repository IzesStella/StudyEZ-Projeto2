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
   * Inscrever o usuário no curso
   */
  public function enroll($id)
  {
    if (!Auth::check()) {
      return response()->json(['error' => 'Usuário não autenticado.'], 401);
    }

    $user = Auth::user();

    // Verifica se o curso existe
    $course = Course::find($id);
    if (!$course) {
      return response()->json(['error' => 'Curso não encontrado.'], 404);
    }

    // Verifica se o usuário já está inscrito
    if ($user->courses()->where('courses_id', $id)->exists()) {
      // ✅ Correção aqui
      return response()->json(
        ['error' => 'Você já está inscrito neste curso!'],
        400
      );
    }

    // Inscreve o usuário no curso
    $user->courses()->attach($id);

    return response()->json(['success' => 'Inscrição realizada com sucesso!']);
  }
}
