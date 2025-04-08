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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Automatically creates an auto-incrementing primary key 'id'
            $table->unsignedBigInteger('user_id'); // Foreign key reference to the 'users' table
            $table->string('name');
            $table->string('phone');
            $table->string('service');
            $table->date('date');
            $table->time('hour');
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending'); // You can customize the statuses
            $table->timestamps(); // Created at and updated at

            // Foreign key constraint for the 'user_id' column, referencing the 'id' of the 'users' table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
