<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Note;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    try {
      $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
      ]);

      $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
      ]);

      return Inertia::location('/login');
    } catch (\Illuminate\Validation\ValidationException $e) {
      return response()->json(
        [
          'errors' => $e->errors(),
        ],
        422
      );
    } catch (\Exception $e) {
      \Log::error($e->getMessage());
      return response()->json(
        [
          'errors' => [
            'message' => ['Ocorreu um erro ao tentar registrar o usuário.'],
          ],
        ],
        500
      );
    }
  }
  public function login(Request $request)
  {
    try {
      $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
      ]);

      if (!Auth::attempt($validatedData)) {
        return response()->json(
          [
            'errors' => [
              'email' => ['Credenciais inválidas.'],
            ],
          ],
          422
        );
      }

      $user = Auth::user();
      $token = $user->createToken('ZiZiToken');

      return response()->json(['token' => $token->plainTextToken]);
    } catch (Exception $e) {
      \Log::error('Erro no login: ' . $e->getMessage());
      return response()->json(
        [
          'errors' => [
            'message' => ['Ocorreu um erro ao tentar fazer login.'],
          ],
        ],
        500
      );
    }
  }

  public function updateProfilePhoto(Request $request)
  {
    $request->validate([
      'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = auth()->user();

    if ($user->profile_photo) {
      $oldPhotoPath = public_path(
        'images/profile_photos/' . $user->profile_photo
      );
      if (file_exists($oldPhotoPath)) {
        unlink($oldPhotoPath);
      }
    }

    $fileName =
      time() .
      '.' .
      $request->file('profile_photo')->getClientOriginalExtension();
    $path = $request
      ->file('profile_photo')
      ->move(public_path('images/profile_photos'), $fileName);

    $user->profile_photo = 'images/profile_photos/' . $fileName;
    $user->save();

    return response()->json([
      'message' => 'Foto de perfil atualizada com sucesso!',
      'photo_url' => asset('images/profile_photos/' . $fileName),
    ]);
  }

  public function deleteProfilePhoto(Request $request)
  {
    $user = auth()->user();

    if ($user->profile_photo) {
      Storage::delete('public/' . $user->profile_photo);

      $user->profile_photo = null;
      $user->save();
    }

    return response()->json([
      'message' => 'Imagem de perfil removida com sucesso.',
    ]);
  }

  public function getUserData()
  {
    $user = auth()->user();

    return response()->json([
      'name' => $user->name,
      'email' => $user->email,
      'profile_photo' => $user->profile_photo
        ? asset($user->profile_photo)
        : asset('images/default-avatar.png' . $fileName),
    ]);
  }

  public function logout()
  {
    $request->user()->tokens->each(function ($token) {
      $token->delete();
    });
    Auth::logout();
    return redirect('/');
  }

  public function checkEnrollment()
  {
    if (!Auth::check()) {
      return response()->json(['status' => 'guest']);
    }

    $user = Auth::user();
    $isEnrolled = $user->courses()->exists();

    return response()->json([
      'status' => $isEnrolled ? 'enrolled' : 'not_enrolled',
    ]);
  }
}
