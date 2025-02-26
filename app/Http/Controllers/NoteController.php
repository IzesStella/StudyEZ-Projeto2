<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;

class NoteController extends Controller
{
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

    public function show($date)
    {
        $note = Note::where('user_id', Auth::id())->where('date', $date)->first();

        if ($note) {
            return response()->json($note);
        }

        return response()->json(['message' => 'Anotação não encontrada'], 404);
    }
}
