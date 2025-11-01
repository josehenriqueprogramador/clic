<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('aulas', 'encontros');
        Schema::rename('temas', 'aulas');
    }

    public function down(): void
    {
        Schema::rename('encontros', 'aulas');
        Schema::rename('aulas', 'temas');
    }
};

