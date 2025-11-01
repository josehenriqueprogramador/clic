<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',200);
            $table->string('telefone',50)->nullable();
            $table->foreignId('turma_id')->nullable()->constrained('turmas')->nullOnDelete();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('alunos');
    }
};
