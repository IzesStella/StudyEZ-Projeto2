<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadeira extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function mentorados()
    {
        return $this->belongsToMany(Mentorado::class, 'mentorado_cadeira');
    }
}
