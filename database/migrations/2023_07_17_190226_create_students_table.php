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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',20);
            $table->string('email',50);
            $table->bigInteger('phone');
            $table->string('gender', 50)->nullable();
            $table->string('languages',255);
            $table->string('qualifications',255);
            $table->text('picture');
            $table->string('password',600);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
