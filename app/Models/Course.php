<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description'];

    // Relacionamento com usuários (muitos para muitos)
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_courses');
    }

    // Relacionamento com perguntas no fórum
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Relacionamento com respostas no fórum (via perguntas)
    public function answers()
    {
        return $this->hasManyThrough(Answer::class, Question::class);
    }

    // Relacionamento com comentários no fórum (via respostas)
    public function comments()
    {
        return $this->hasManyThrough(Comment::class, Answer::class);
    }
}