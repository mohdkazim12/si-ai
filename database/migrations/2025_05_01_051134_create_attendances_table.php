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
        Schema::create('attendances', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('marked_by'); // Teacher/admin who marked
                $table->unsignedBigInteger('user_id'); // Student's ID
                $table->date('date'); // Attendance date
                $table->dateTime('marked_at'); // Attendance marked_at
                $table->enum('status', ['present', 'absent', 'late', 'half-day'])->default('present');
                $table->string('remarks')->nullable();
                $table->timestamps();
    
                // Indexes and constraints
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('marked_by')->references('id')->on('users')->onDelete('cascade');
                $table->unique(['user_id', 'date']); // To avoid duplicate attendance for same day
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
