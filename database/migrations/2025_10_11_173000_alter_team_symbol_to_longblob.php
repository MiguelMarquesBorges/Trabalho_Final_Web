<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Alterar a coluna team_symbol para LONGBLOB
        DB::statement('ALTER TABLE teams MODIFY team_symbol LONGBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverter para BLOB padrão
        DB::statement('ALTER TABLE teams MODIFY team_symbol BLOB');
    }
};
