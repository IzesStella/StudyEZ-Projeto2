<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = ['name', 'description'];

    // Relacionamento com usuários (muitos para muitos)
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
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