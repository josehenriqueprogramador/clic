<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('aulas', function (Blueprint $table) {
    $table->id();
    $table->date('data');
    $table->foreignId('tema_id')->constrained('temas')->cascadeOnDelete();
    $table->foreignId('professor_id')->constrained('professores')->cascadeOnDelete();
    $table->foreignId('turma_id')->constrained('turmas')->cascadeOnDelete();
    $table->timestamps();
});
    }

    public function down(): void {
        Schema::dropIfExists('aulas');
    }
};
