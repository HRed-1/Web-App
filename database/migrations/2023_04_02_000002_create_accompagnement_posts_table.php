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
        Schema::create('accompagnement_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('porteur_id')->nullable();
            $table->unsignedBigInteger('conseiller_id')->nullable();
            $table->unsignedBigInteger('programme_id')->nullable();
            $table->dateTime('Date')->nullable();
            $table->text('Detail')->nullable();
            $table->string('Attach')->nullable();
            $table->string('Photo')->nullable();
            $table->string('projet')->nullable();
            $table->unsignedBigInteger('type_accomp_post_id');
            $table->boolean('check')->nullable();
            $table->unsignedBigInteger('projet_id');
            $table->string('action')->nullable();
            $table->string('diagnostic')->nullable();
            $table->string('resultat')->nullable();
            $table->string('objectif')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accompagnement_posts');
    }
};
