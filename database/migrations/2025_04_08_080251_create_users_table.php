<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Crează un câmp auto-incrementabil pentru ID
            $table->string('username', 255)->unique(); // Câmpul `username` va fi un șir de caractere de maxim 255 de caractere și trebuie să fie unic
            $table->string('email')->unique(); // Câmpul `email` va fi un șir de caractere și va fi unic
            $table->string('password'); // Câmpul `password` va fi un șir de caractere pentru stocarea parolelor
            $table->enum('role', ['admin', 'user', 'receptionist', 'employee']); // Câmpul `role` va fi un tip de date enum cu valorile permise
            $table->string('employee_role')->nullable(); // Câmpul `employee_role` va fi un șir de caractere, dar poate fi null
            $table->timestamps(); // Câmpurile `created_at` și `updated_at` vor fi gestionate automat de Laravel
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
