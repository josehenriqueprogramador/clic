<?php
// =====================================================
// MODELOS DO SISTEMA CLIC COMPLETOS E RELACIONADOS
// =====================================================
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ---------------------- CICLO ----------------------
class Ciclo extends Model {
    use HasFactory;
    protected $fillable = ['numero', 'ano', 'data_inicio', 'data_fim'];

    public function turmas() {
        return $this->hasMany(Turma::class);
    }
}

// ---------------------- CURSO ----------------------
class Curso extends Model {
    use HasFactory;
    protected $fillable = ['titulo'];

    public function aulas() {
        return $this->hasMany(Aula::class);
    }
}

// ---------------------- LOCALIDADE ----------------------
class Localidade extends Model {
    use HasFactory;
    protected $fillable = ['nome'];

    public function turmas() {
        return $this->hasMany(Turma::class);
    }
}

// ---------------------- TURMA ----------------------
class Turma extends Model {
    use HasFactory;
    protected $fillable = ['nome', 'ciclo_id', 'curso_id', 'localidade_id'];

    public function ciclo() {
        return $this->belongsTo(Ciclo::class);
    }

    public function curso() {
        return $this->belongsTo(Curso::class);
    }

    public function localidade() {
        return $this->belongsTo(Localidade::class);
    }

    public function alunos() {
        return $this->hasMany(Aluno::class);
    }

    public function encontros() {
        return $this->hasMany(Encontro::class);
    }
}

// ---------------------- PROFESSOR ----------------------
class Professor extends Model {
    use HasFactory;
    protected $fillable = ['nome'];

    public function encontros() {
        return $this->hasMany(Encontro::class);
    }

    public function aulas() {
        return $this->hasMany(Aula::class);
    }
}

// ---------------------- ENCONTRO ----------------------
class Encontro extends Model {
    use HasFactory;
    protected $fillable = ['data', 'tema_id', 'professor_id', 'turma_id'];

    public function turma() {
        return $this->belongsTo(Turma::class);
    }

    public function professor() {
        return $this->belongsTo(Professor::class);
    }

    public function tema() {
        return $this->belongsTo(Aula::class, 'tema_id');
    }
}

// ---------------------- AULA ----------------------
class Aula extends Model {
    use HasFactory;
    protected $fillable = ['titulo', 'curso_id'];

    public function curso() {
        return $this->belongsTo(Curso::class);
    }

    public function encontros() {
        return $this->hasMany(Encontro::class, 'tema_id');
    }
}

// ---------------------- ALUNO ----------------------
class Aluno extends Model {
    use HasFactory;
    protected $fillable = ['nome', 'turma_id'];

    public function turma() {
        return $this->belongsTo(Turma::class);
    }
}

// ---------------------- CHAMADA ----------------------
class Chamada extends Model {
    use HasFactory;
    protected $fillable = ['encontro_id', 'aluno_id', 'presente'];

    public function encontro() {
        return $this->belongsTo(Encontro::class);
    }

    public function aluno() {
        return $this->belongsTo(Aluno::class);
    }
}
