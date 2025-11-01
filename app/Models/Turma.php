<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'curso_id',
        'ciclo_id',
        'localidade_id',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }

    public function localidade()
    {
        return $this->belongsTo(Localidade::class);
    }

    public function encontros()
    {
        return $this->hasMany(Encontro::class);
    }
}

