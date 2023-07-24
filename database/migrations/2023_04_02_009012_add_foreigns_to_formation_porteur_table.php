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
        Schema::table('formation_porteur', function (Blueprint $table) {
            $table
                ->foreign('formation_id')
                ->references('id')
                ->on('formations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('porteur_id')
                ->references('id')
                ->on('porteurs')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formation_porteur', function (Blueprint $table) {
            $table->dropForeign(['formation_id']);
            $table->dropForeign(['porteur_id']);
        });
    }
};
