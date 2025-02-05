<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentorado extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function cadeiras()
    {
        return $this->belongsToMany(Cadeira::class, 'mentorado_cadeira');
    }
}
