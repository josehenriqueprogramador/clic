<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'curso_id',
        'descricao',
        'ordem',
        // adicione aqui os campos reais da tabela `aulas`
    ];

    // 🔗 Relação: cada aula pertence a um curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    // (se existir relação com encontros, adicione também)
    public function encontros()
    {
        return $this->belongsToMany(Encontro::class, 'encontro_aula');
    }
}

