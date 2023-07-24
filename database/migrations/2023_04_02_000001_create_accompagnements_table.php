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
        Schema::create('accompagnements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('porteur_id')->nullable();
            $table->unsignedBigInteger('conseiller_id')->nullable();
            $table->unsignedBigInteger('type_accompagnement_id')->nullable();
            $table->unsignedBigInteger('programme_id')->nullable();
            $table->dateTime('Date')->nullable();
            $table->text('Detail')->nullable();
            $table->string('Attach')->nullable();
            $table->string('photo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accompagnements');
    }
};
