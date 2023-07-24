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
        Schema::create('devis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('devis_fournisseur_id')->nullable();
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->decimal('Montant', 12 , 2)->nullable();
            $table->string('Sort')->nullable();
            $table->string('file')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
