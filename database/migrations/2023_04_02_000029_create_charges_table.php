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
        Schema::create('charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('projet_id');
            $table->string('Type')->nullable();
            $table->string('Title')->nullable();
            $table->string('Reglement')->nullable();
            $table->decimal('Mensuel', 14, 2)->nullable();
            $table->decimal('Trimestriel', 14, 2)->nullable();
            $table->decimal('Semstriel', 14, 2)->nullable();
            $table->decimal('Annuel', 14, 2)->nullable();
            $table->string('Evolution')->nullable();
            $table->decimal('Montant_N1', 14, 2)->nullable();
            $table->decimal('Montant_N2', 14, 2)->nullable();
            $table->decimal('Montant_N3', 14, 2)->nullable();
            $table->decimal('Montant_N4', 14, 2)->nullable();
            $table->decimal('Montant_N5', 14, 2)->nullable();
            $table->decimal('Montant_N6', 14, 2)->nullable();
            $table->decimal('Montant_N7', 14, 2)->nullable();
            $table->unsignedBigInteger('charge_poste_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charges');
    }
};
