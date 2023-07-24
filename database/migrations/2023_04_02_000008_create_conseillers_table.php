<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conseillers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name')->nullable();
            $table->string('Birthday')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Email')->nullable();
            $table->string('Genre')->nullable();
            $table->string('Photo')->nullable();
            $table->string('Formation')->nullable();
            $table->string('Expertise')->nullable();
            $table->string('Experience')->nullable();
            $table->string('Attach')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conseillers');
    }
};
