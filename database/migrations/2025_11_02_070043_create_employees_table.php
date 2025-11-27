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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->unsignedBigInteger('mgr_id');
            $table->foreign('mgr_id')->references('id')->on('employees')->onDelete('restrict');
            $table->decimal('salary', 8, 2);
            $table->string('email')->unique();
            $table->string('position');
            $table->string('phone_number')->unique();
            $table->string('specialization')->nullable();
            $table->time('working_hours_start');
            $table->time('working_hours_end');
            $table->integer('years_of_experience')->default(0);
            $table->enum('role', ['coach', 'employee'])->default('employee');
            $table->date('hire_date');
            $table->text('image');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
