<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];

    // Relacionamento com cursos (muitos para muitos)
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'users_courses');
    }

    // Relacionamento com perguntas no fórum
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Relacionamento com respostas no fórum
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // Relacionamento com comentários
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relacionamento com anotações (planner)
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
