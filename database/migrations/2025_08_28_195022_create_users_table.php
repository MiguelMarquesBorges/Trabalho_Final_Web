<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoincrement();
            $table->string('username', 50)->nullable()->unique();
            $table->string('password', 200)->nullable();
            $table->dateTime('last_login')->nullable();
            $table->timestamps(); //created_it: e updated_it:
            $table->softDeletes(); // deleted_it
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
