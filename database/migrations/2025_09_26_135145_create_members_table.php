<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id()->autoincrement();
            $table->integer('member_cpf');
            $table->string('member_name', 40);
            $table->date('member_date_birth');
            $table->string('member_function', 8);
            $table->string('member_position', 16)->nullable();
            $table->integer('member_number')->nullable();
            $table->foreignId('team_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
