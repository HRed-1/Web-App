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
        Schema::create('moyen_humains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('projet_id');
            $table->unsignedBigInteger('poste_id')->nullable();
            $table->string('Contrat')->nullable();
            $table->integer('Effectif')->nullable();
            $table->decimal('Salaire')->nullable();
            $table->decimal('Mois')->nullable();
            $table->integer('Evolution')->nullable();
            $table->decimal('Salaire_N1')->nullable();
            $table->decimal('Salaire_N2')->nullable();
            $table->decimal('Salaire_N3')->nullable();
            $table->decimal('Salaire_N4')->nullable();
            $table->decimal('Salaire_N5')->nullable();
            $table->decimal('Salaire_N6')->nullable();
            $table->decimal('Salaire_N7')->nullable();
            $table->decimal('Taux_ch')->nullable();
            $table->decimal('ChSociale_N1')->nullable();
            $table->decimal('ChSociale_N2')->nullable();
            $table->decimal('ChSociale_N3')->nullable();
            $table->decimal('ChSociale_N4')->nullable();
            $table->decimal('ChSociale_N5')->nullable();
            $table->decimal('ChSociale_N6')->nullable();
            $table->decimal('ChSociale_N7')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moyen_humains');
    }
};
