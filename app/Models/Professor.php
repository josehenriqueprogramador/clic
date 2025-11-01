<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    // Informar o nome correto da tabela
    protected $table = 'professores';

    // Campos que podem ser preenchidos em massa
    protected $fillable = ['nome'];
}

