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
        Schema::table('formations', function (Blueprint $table) {
            $table
                ->foreign('module_id')
                ->references('id')
                ->on('modules')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('conseiller_id')
                ->references('id')
                ->on('conseillers')
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
        Schema::table('formations', function (Blueprint $table) {
            $table->dropForeign(['module_id']);
            $table->dropForeign(['conseiller_id']);
            $table->dropForeign(['programme_id']);
        });
    }
};
