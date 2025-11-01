<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('turmas', function (Blueprint $table) {
    $table->id();
    $table->string('nome', 100)->nullable();
    $table->foreignId('curso_id')->constrained('cursos')->cascadeOnDelete();
    $table->foreignId('ciclo_id')->constrained('ciclos')->cascadeOnDelete();
    $table->foreignId('localidade_id')->constrained('localidades')->cascadeOnDelete();
    $table->timestamps();
});
    }

    public function down(): void {
        Schema::dropIfExists('turmas');
    }
};
