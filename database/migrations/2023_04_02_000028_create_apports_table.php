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
        Schema::create('apports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Title')->nullable();
            $table->decimal('Montant_N1', 14, 2)->nullable();
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->boolean('en_nature')->nullable();
            $table->string('composante')->nullable();
            $table->unsignedBigInteger('investissement_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apports');
    }
};
