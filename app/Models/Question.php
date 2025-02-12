<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'content', 'course_id', 'user_id'];

    // Relacionamento com o curso (cada pergunta pertence a um curso)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relacionamento com o usuário (criador da pergunta)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com respostas (uma pergunta pode ter várias respostas)
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // Relacionamento com comentários (através das respostas)
    public function comments()
    {
        return $this->hasManyThrough(Comment::class, Answer::class);
    }
}