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
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('montant', 14, 2)->nullable();
            $table->unsignedBigInteger('devis_fournisseur_id')->nullable();
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->string('file')->nullable();
            $table->boolean('payement');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
