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
        Schema::create('swots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pfort')->nullable();
            $table->string('pfaible')->nullable();
            $table->string('opportunity')->nullable();
            $table->string('threat')->nullable();
            $table->unsignedBigInteger('projet_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swots');
    }
};
