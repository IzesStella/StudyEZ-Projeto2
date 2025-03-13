<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Verifica se o usuário está inscrito no curso
     */
    public function isEnrolled($id)
    {
        $user = Auth::user();
        $enrolled = $user ? $user->courses()->where('courses_id', $id)->exists() : false;
        return response()->json(['enrolled' => $enrolled]);
    }

    /**
     * Inscrever o usuário no curso
     */
    public function enroll($id)
    {
        $user = Auth::user();
        $course = Course::findOrFail($id);

        if ($user->courses()->where('courses_id', $id)->exists()) {
            return response()->json(
                ['error' => 'Você já está inscrito neste curso!'],
                409 // Mudado para 409 Conflict
            );
        }

        $user->courses()->attach($course);
        return response()->json(['success' => 'Inscrição realizada com sucesso!']);
    }

    /**
     * Desinscrever o usuário do curso
     */
    public function unenroll($id)
    {
        $user = Auth::user();
        $course = Course::findOrFail($id);

        if (!$user->courses()->where('courses_id', $id)->exists()) {
            return response()->json(
                ['error' => 'Você não está inscrito neste curso!'],
                404 // Mudado para 404 Not Found
            );
        }

        $user->courses()->detach($course);
        return response()->json(['success' => 'Desinscrição realizada com sucesso!']);
    }
}