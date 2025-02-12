<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['content', 'question_id', 'user_id'];

    // Relacionamento com a pergunta
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // Relacionamento com o usuário que criou a resposta
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com comentários
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
