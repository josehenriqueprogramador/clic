<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Remove a coluna professor_id de forma segura
        if (Schema::hasColumn('encontros', 'professor_id')) {
            // Drop da foreign key diretamente via SQL
            DB::statement('ALTER TABLE encontros DROP FOREIGN KEY aulas_professor_id_foreign;');

            Schema::table('encontros', function (Blueprint $table) {
                $table->dropColumn('professor_id');
            });
        }
    }

    public function down(): void
    {
        Schema::table('encontros', function (Blueprint $table) {
            $table->foreignId('professor_id')
                  ->constrained('professores')
                  ->onDelete('cascade');
        });
    }
};

