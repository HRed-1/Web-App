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
        Schema::table('projets', function (Blueprint $table) {
            $table
                ->foreign('porteur_id')
                ->references('id')
                ->on('porteurs')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('programme_id')
                ->references('id')
                ->on('programmes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('phase_id')
                ->references('id')
                ->on('phases')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('secteur_actvite_id')
                ->references('id')
                ->on('secteur_actvites')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->dropForeign(['porteur_id']);
            $table->dropForeign(['programme_id']);
            $table->dropForeign(['phase_id']);
            $table->dropForeign(['commune_id']);
            $table->dropForeign(['secteur_actvite_id']);
        });
    }
};
