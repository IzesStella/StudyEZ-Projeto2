<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'answer_id', 'user_id'];

    // Relacionamento com a resposta
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    // Relacionamento com o usuário que criou o comentário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
