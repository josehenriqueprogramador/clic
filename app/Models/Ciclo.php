<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'ano', 'data_inicio', 'data_fim'];

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}

