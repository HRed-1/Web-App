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
        Schema::create('materiels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('ref')->nullable();
            $table->text('detail')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('projet_id');
            $table->boolean('reception')->nullable();
            $table->boolean('check1')->nullable();
            $table->boolean('check2')->nullable();
            $table->boolean('check3')->nullable();
            $table->boolean('check4')->nullable();
            $table->boolean('check5')->nullable();
            $table->date('date1')->nullable();
            $table->date('date2')->nullable();
            $table->date('date3')->nullable();
            $table->date('date4')->nullable();
            $table->date('date5')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
};
