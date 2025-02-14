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
    // Método de registro
    public function register(Request $request)
    {
        // Validação dos dados do usuário
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
    
            // Redireciona para a página de login após o registro
            return Inertia::location('/login'); // Altere para a rota correta da sua página de login
        } catch (\Exception $e) {
            // Log the error
            \Log::error($e->getMessage());
    
            return response()->json(['error' => 'Erro ao registrar usuário.'], 500);
        }
    }

    // Método de login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('YourAppName')->plainTextToken(); // Gera o token
            return response()->json(['token' => $token]);
        }
    
        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

public function saveNote(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'content' => 'required|string',
    ]);

    $note = Note::updateOrCreate(
        [
            'user_id' => Auth::id(),
            'date' => $request->date,
        ],
        [
            'content' => $request->content,
        ]
    );

    return response()->json(['message' => 'Anotação salva com sucesso!', 'note' => $note]);
}

public function getNotes()
{
    $notes = Note::where('user_id', Auth::id())->get();
    return response()->json($notes);
}
    
}


