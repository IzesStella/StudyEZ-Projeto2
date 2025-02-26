<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'content', 'user_id'];

    // Relacionamento com o usuário que criou a anotação
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
