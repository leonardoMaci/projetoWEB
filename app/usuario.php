<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $fillable = [
        'usuario',
        'senha',
        'dominio',
        'cliente_id',
    ];
}
