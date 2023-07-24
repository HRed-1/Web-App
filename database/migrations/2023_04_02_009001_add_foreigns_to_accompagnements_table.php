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
        Schema::table('accompagnements', function (Blueprint $table) {
            $table
                ->foreign('porteur_id')
                ->references('id')
                ->on('porteurs')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('conseiller_id')
                ->references('id')
                ->on('conseillers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('type_accompagnement_id')
                ->references('id')
                ->on('type_accompagnements')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('programme_id')
                ->references('id')
                ->on('programmes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accompagnements', function (Blueprint $table) {
            $table->dropForeign(['porteur_id']);
            $table->dropForeign(['conseiller_id']);
            $table->dropForeign(['type_accompagnement_id']);
            $table->dropForeign(['programme_id']);
        });
    }
};
