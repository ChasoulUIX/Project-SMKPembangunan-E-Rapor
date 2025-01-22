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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['L', 'P'])->default('');
            $table->string('birth_place')->default('');
            $table->date('birth_date')->nullable();
            $table->text('address')->default('');
            $table->string('phone_number')->default('');
            $table->string('photo')->default('');
            $table->enum('role', ['murid', 'guru', 'wali', 'admin'])->default('guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
