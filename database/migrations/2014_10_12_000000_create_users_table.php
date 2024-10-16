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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // each column (could have more than 1 constraint)
            // unique constraint => value that can not be repeated + could be null (nullable())
            // nullable constraint => could be null

            $table->string('username')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('user_type',['student','instructor','admin'])->default('student');
            $table->string('password');
            $table->string('phone')->nullable()->unique();
            $table->enum('gender',['male','female'])->nullable();
            $table->rememberToken();
            $table->timestamps();
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
