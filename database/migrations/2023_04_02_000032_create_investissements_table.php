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
        Schema::create('investissements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->string('Title')->nullable();
            $table->integer('Qty')->nullable();
            $table->decimal('PU', 14, 2)->nullable();
            $table->decimal('Invest_N1', 14, 2)->nullable();
            $table->integer('Amortissement')->nullable();
            $table->integer('amortissable')->nullable();
            $table->decimal('Montant_N1', 14, 2)->nullable();
            $table->decimal('Montant_N2', 14, 2)->nullable();
            $table->decimal('Montant_N3', 14, 2)->nullable();
            $table->decimal('Montant_N4', 14, 2)->nullable();
            $table->decimal('Montant_N5', 14, 2)->nullable();
            $table->decimal('Montant_N6', 14, 2)->nullable();
            $table->decimal('Montant_N7', 14, 2)->nullable();
            $table->integer('N1')->nullable();
            $table->integer('N2')->nullable();
            $table->integer('N3')->nullable();
            $table->integer('N4')->nullable();
            $table->integer('N5')->nullable();
            $table->integer('N6')->nullable();
            $table->integer('N7')->nullable();
            $table->unsignedBigInteger('actif_poste_id')->nullable();
            $table->string('photo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investissements');
    }
};
