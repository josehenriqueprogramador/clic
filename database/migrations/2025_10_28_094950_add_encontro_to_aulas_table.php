<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('aulas', function (Blueprint $table) {
            $table->foreignId('encontro_id')->nullable()->after('curso_id')->constrained('encontros')->onDelete('cascade');
            $table->tinyInteger('ordem')->default(1)->after('encontro_id'); // 1 ou 2
        });
    }

    public function down(): void
    {
        Schema::table('aulas', function (Blueprint $table) {
            $table->dropColumn('ordem');
            $table->dropForeign(['encontro_id']);
            $table->dropColumn('encontro_id');
        });
    }
};

