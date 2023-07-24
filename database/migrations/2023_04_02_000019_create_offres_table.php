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
        Schema::create('offres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Type')->nullable();
            $table->string('Title')->nullable();
            $table->string('Title_ar')->nullable();
            $table->text('Detail')->nullable();
            $table->decimal('Price', 12 , 2)->nullable();
            
            $table->unsignedBigInteger('projet_id');
            $table->string('photo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
