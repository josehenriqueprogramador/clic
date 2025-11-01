<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encontro extends Model
{
    protected $fillable = ['data', 'turma_id'];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function aulas()
    {
        return $this->belongsToMany(Aula::class, 'encontro_aula')
                    ->withPivot('professor_id')
                    ->withTimestamps();
    }

    public function professores()
    {
        return $this->belongsToMany(Professor::class, 'encontro_aula', 'encontro_id', 'professor_id')
                    ->withPivot('aula_id')
                    ->withTimestamps();
    }
}

