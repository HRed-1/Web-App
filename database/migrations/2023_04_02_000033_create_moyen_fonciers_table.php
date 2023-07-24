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
        Schema::create('moyen_fonciers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Title')->nullable();
            $table->string('Photo')->nullable();
            $table->string('Usage')->nullable();
            $table->string('Zone')->nullable();
            $table->boolean('amenagement')->nullable();
            $table->unsignedBigInteger('investissement_id')->nullable();
            $table->unsignedBigInteger('charge_id')->nullable();
            $table->unsignedBigInteger('projet_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moyen_fonciers');
    }
};
