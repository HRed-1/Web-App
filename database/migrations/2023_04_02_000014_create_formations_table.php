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
        Schema::create('formations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('module_id')->nullable();
            $table->unsignedBigInteger('conseiller_id')->nullable();
            $table->unsignedBigInteger('programme_id')->nullable();
            $table->dateTime('Debut')->nullable();
            $table->dateTime('Fin')->nullable();
            $table->string('Lieu')->nullable();
            $table->string('Attach')->nullable();
            $table->string('Photo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
