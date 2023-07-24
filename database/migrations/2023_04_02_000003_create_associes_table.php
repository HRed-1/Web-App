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
        Schema::create('associes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name')->nullable();
            $table->string('Name_ar')->nullable();
            $table->string('CIN')->nullable();
            $table->string('Genre')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Email')->nullable();
            $table->date('date_now')->nullable();
            $table->string('Birth_date')->nullable();
            $table->string('age')->nullable();
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->string('Adresse')->nullable();
            $table->string('Attach')->nullable();
            $table->string('Photo')->nullable();
            $table->unsignedBigInteger('porteur_id')->nullable();
            $table->string('Formation')->nullable();
            $table->string('Experience')->nullable();
            $table->boolean('admin')->nullable();
            $table->boolean('actif')->nullable();
            $table->string('poste')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associes');
    }
};
