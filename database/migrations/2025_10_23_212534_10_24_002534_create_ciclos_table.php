<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ciclos', function (Blueprint $table) {
    $table->id();
    $table->unsignedTinyInteger('numero');
    $table->unsignedSmallInteger('ano');
    $table->date('data_inicio')->nullable();
    $table->date('data_fim')->nullable();
    $table->timestamps();
    $table->unique(['numero','ano']);
});
    }

    public function down(): void {
        Schema::dropIfExists('ciclos');
    }
};
