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
        Schema::create('emprunts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('projet_id');
            $table->string('Title')->nullable();
            $table->decimal('Montant_N1', 14, 2)->nullable();
            $table->decimal('Taux', 14, 2)->nullable();
            $table->integer('Duree')->nullable();
            $table->string('Reglement')->nullable();
            $table->decimal('Echance_N1', 14, 2)->nullable();
            $table->decimal('Echance_N2', 14, 2)->nullable();
            $table->decimal('Echance_N3', 14, 2)->nullable();
            $table->decimal('Echance_N4', 14, 2)->nullable();
            $table->decimal('Echance_N5', 14, 2)->nullable();
            $table->decimal('Echance_N6', 14, 2)->nullable();
            $table->decimal('Echance_N7', 14, 2)->nullable();
            $table->decimal('Interet_N1', 14, 2)->nullable();
            $table->decimal('Interet_N2', 14, 2)->nullable();
            $table->decimal('Interet_N3', 14, 2)->nullable();
            $table->decimal('Interet_N4', 14, 2)->nullable();
            $table->decimal('Interet_N5', 14, 2)->nullable();
            $table->decimal('Interet_N6', 14, 2)->nullable();
            $table->decimal('Interet_N7', 14, 2)->nullable();
            $table->decimal('Amort_N1', 14, 2)->nullable();
            $table->decimal('Amort_N2', 14, 2)->nullable();
            $table->decimal('Amort_N3', 14, 2)->nullable();
            $table->decimal('Amort_N4', 14, 2)->nullable();
            $table->decimal('Amort_N5', 14, 2)->nullable();
            $table->decimal('Amort_N6', 14, 2)->nullable();
            $table->decimal('Amort_N7', 14, 2)->nullable();
            $table->decimal('Rest_N1', 14, 2)->nullable();
            $table->decimal('Rest_N2', 14, 2)->nullable();
            $table->decimal('Rest_N3', 14, 2)->nullable();
            $table->decimal('Rest_N4', 14, 2)->nullable();
            $table->decimal('Rest_N5', 14, 2)->nullable();
            $table->decimal('Rest_N6', 14, 2)->nullable();
            $table->decimal('Rest_N7', 14, 2)->nullable();
            $table->integer('N1')->nullable();
            $table->integer('N2')->nullable();
            $table->integer('N3')->nullable();
            $table->integer('N4')->nullable();
            $table->integer('N5')->nullable();
            $table->integer('N6')->nullable();
            $table->integer('N7')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprunts');
    }
};
