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
        Schema::table('porteurs', function (Blueprint $table) {
            $table
                ->foreign('forme_juridique_id')
                ->references('id')
                ->on('forme_juridiques')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('secteur_actvite_id')
                ->references('id')
                ->on('secteur_actvites')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('porteurs', function (Blueprint $table) {
            $table->dropForeign(['forme_juridique_id']);
            $table->dropForeign(['secteur_actvite_id']);
            $table->dropForeign(['commune_id']);
            $table->dropForeign(['user_id']);
        });
    }
};
