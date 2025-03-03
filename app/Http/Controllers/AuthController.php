<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    } catch (\Exception $e) {
      \Log::error($e->getMessage());
      return Inertia::render('Auth/Register', [
        'errors' => [
          'message' => $e->getMessage(),
        ],
      ]);
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
