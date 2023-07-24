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
        Schema::table('concurrents', function (Blueprint $table) {
            $table
                ->foreign('projet_id')
                ->references('id')
                ->on('projets')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('concurrents', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
        });
    }
};
