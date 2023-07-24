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
        Schema::table('moyen_fonciers', function (Blueprint $table) {
            $table
                ->foreign('investissement_id')
                ->references('id')
                ->on('investissements')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('charge_id')
                ->references('id')
                ->on('charges')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

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
        Schema::table('moyen_fonciers', function (Blueprint $table) {
            $table->dropForeign(['investissement_id']);
            $table->dropForeign(['charge_id']);
            $table->dropForeign(['projet_id']);
        });
    }
};
