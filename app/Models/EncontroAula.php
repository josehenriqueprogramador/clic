<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EncontroAula extends Model
{
    protected $table = 'encontro_aula';
    protected $fillable = ['encontro_id', 'aula_id', 'professor_id'];
    public $timestamps = true;
}
