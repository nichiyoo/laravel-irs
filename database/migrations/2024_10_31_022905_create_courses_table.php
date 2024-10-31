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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code')->unique();
            $table->string('name');
            $table->integer('sks')->default(2);
            $table->integer('day')->default(1)->comment('day of the week');
            $table->time('start')->default('08:00:00');
            $table->time('end')->default('10:00:00');
            $table->string('room')->nullable();
            $table->string('teacher')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
