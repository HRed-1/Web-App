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
        Schema::create('chiffre_affaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->unsignedBigInteger('offre_id')->nullable();
            $table->string('Title')->nullable();
            $table->string('Mode')->nullable();
            $table->decimal('Price', 14, 2)->nullable();
            $table->string('Unity')->nullable();
            $table->integer('Qty')->nullable();
            $table->string('Evolution')->nullable();
            $table->decimal('Montant_CA_N1', 14, 2)->nullable();
            $table->decimal('Montant_CA_N2', 14, 2)->nullable();
            $table->decimal('Montant_CA_N3', 14, 2)->nullable();
            $table->decimal('Montant_CA_N4', 14, 2)->nullable();
            $table->decimal('Montant_CA_N5', 14, 2)->nullable();
            $table->decimal('Montant_CA_N6', 14, 2)->nullable();
            $table->decimal('Montant_CA_N7', 14, 2)->nullable();
            $table->string('Cout_Charge')->nullable();
            $table->decimal('Montant_CHVar_N1', 14, 2)->nullable();
            $table->decimal('Montant_CHVar_N2', 14, 2)->nullable();
            $table->decimal('Montant_CHVar_N3', 14, 2)->nullable();
            $table->decimal('Montant_CHVar_N4', 14, 2)->nullable();
            $table->decimal('Montant_CHVar_N5', 14, 2)->nullable();
            $table->decimal('Montant_CHVar_N6', 14, 2)->nullable();
            $table->decimal('Montant_CHVar_N7', 14, 2)->nullable();
            $table->string('mode1')->nullable();
            $table->decimal('CA_D', 14, 2)->nullable();
            $table->decimal('CA_G', 14, 2)->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chiffre_affaires');
    }
};
