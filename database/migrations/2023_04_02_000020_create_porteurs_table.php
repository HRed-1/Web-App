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
        Schema::create('porteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name')->nullable();
            $table->string('Name_ar')->nullable();
            $table->unsignedBigInteger('forme_juridique_id')->nullable();
            $table->boolean('Creer')->nullable();
            $table->date('Date_creation')->nullable();
            $table
                ->string('ID_RC')
                ->nullable()
                ->unique();
            $table
                ->string('ID_RCOP')
                ->nullable()
                ->unique();
            $table
                ->string('ID_ICE')
                ->nullable()
                ->unique();
            $table->unsignedBigInteger('secteur_actvite_id')->nullable();
            $table->string('Activity')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Email')->nullable();
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->string('Adresse')->nullable();
            $table->integer('Membre')->nullable();
            $table->integer('Membre_F')->nullable();
            $table->integer('Membre_H')->nullable();
            $table->integer('Membre_JH')->nullable();
            $table->integer('Membre_JF')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('validite')->nullable();
            $table->date('date_renouv')->nullable();
            $table->integer('nmbr_conseil')->nullable();
            $table->date('date_assemble')->nullable();
            $table->string('name_represent')->nullable();
            $table->string('cin_represent')->nullable();
            $table->string('phone_represent')->nullable();
            $table->string('if')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('porteurs');
    }
};
