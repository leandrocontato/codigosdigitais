<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acesso extends Model
{
    protected $fillable = [
        'titulo', 'modulos_de_acesso',
    ];

    protected $casts = [
        'modulos_de_acesso' => 'array',
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}

