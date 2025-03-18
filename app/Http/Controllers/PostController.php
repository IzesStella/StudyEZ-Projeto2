<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function store(Request $request, \App\Models\Course $course)
  {
    try {
      $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
      ]);

      $user = Auth::user();

      $post = new Post();
      $post->title = $request->title;
      $post->content = $request->content;
      $post->user_id = $user->id;
      $post->user_name = $user->name;
      $post->user_profile_photo =
        '/images/profile_photos/' . $user->profile_photo;

      $post->course_id = $course->id;
      $post->save();

      return response()->json(
        [
          'id' => $post->id,
          'title' => $post->title,
          'content' => $post->content,
          'user_id' => $post->user_id,
          'user_name' => $post->user_name,
          'user_profile_photo' => $post->user_profile_photo,
          'course_id' => $post->course_id,
          'created_at' => $post->created_at,
        ],
        201
      );
    } catch (\Exception $e) {
      \Log::error('Erro ao criar post: ' . $e->getMessage());
      return response()->json(['error' => 'Erro ao criar post.'], 500);
    }
  }

  public function update(Request $request, \App\Models\Course $course, $postId)
  {
    try {
      $request->validate([
        'title' => 'string|max:255',
        'content' => 'string',
      ]);

      $post = Post::where('course_id', $course->id)->findOrFail($postId);

      if (Auth::id() !== $post->user_id) {
        return response()->json(['error' => 'Não autorizado.'], 403);
      }

      $post->update($request->only('title', 'content'));

      return response()->json($post);
    } catch (\Exception $e) {
      \Log::error('Erro ao atualizar post: ' . $e->getMessage());
      return response()->json(['error' => 'Erro ao atualizar post.'], 500);
    }
  }

  public function destroy(\App\Models\Course $course, $postId)
  {
    try {
      $post = Post::where('course_id', $course->id)->findOrFail($postId);

      if (Auth::id() !== $post->user_id) {
        return response()->json(['error' => 'Não autorizado.'], 403);
      }

      $post->delete();

      return response()->json(null, 204);
    } catch (\Exception $e) {
      \Log::error('Erro ao excluir post: ' . $e->getMessage());
      return response()->json(['error' => 'Erro ao excluir post.'], 500);
    }
  }

  // PostController.php

  public function index(\App\Models\Course $course)
  {
    // Carrega os posts desse curso
    // Aqui estamos assumindo que user_name e user_profile_photo já estão salvos em cada post
    // Mas se você quiser pegar diretamente da tabela users, podemos adaptar também.

    $posts = $course->posts->map(function ($post) {
      return [
        'id' => $post->id,
        'title' => $post->title,
        'content' => $post->content,
        'user_id' => $post->user_id,
        'user_name' => $post->user_name, // caso esteja salvo no BD
        'user_profile_photo' => $post->user_profile_photo,
        'course_id' => $post->course_id,
        'created_at' => $post->created_at->diffForHumans(), // ou format() se preferir
      ];
    });

    return response()->json($posts);
  }
}
