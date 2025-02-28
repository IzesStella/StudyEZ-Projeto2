<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{

    use HasApiTokens, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    // Relacionamento com cursos (muitos para muitos)
    public function courses(): BelongsToMany
{
        return $this->belongsToMany(Course::class, 'course_user', 'user_id', 'course_id');
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
