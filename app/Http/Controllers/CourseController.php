<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Retorna todos os cursos como JSON
    public function index()
    {
        return response()->json(Course::all());
    }

    // Retorna os detalhes de um curso específico
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Curso não encontrado'], 404);
        }

        return response()->json($course);
    }
}