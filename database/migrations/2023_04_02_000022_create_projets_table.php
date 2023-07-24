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
        Schema::create('projets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Title')->nullable();
            $table->string('Title_ar')->nullable();
            $table->text('Detail')->nullable();
            $table->text('Detail_ar')->nullable();
            $table->decimal('Cout', 14, 2)->nullable();
            $table->decimal('Apport', 14, 2)->nullable();
            $table->decimal('Subvention', 14, 2)->nullable();
            $table->decimal('Emprunt', 14, 2)->nullable();
            $table->unsignedBigInteger('porteur_id')->nullable();
            $table->unsignedBigInteger('programme_id')->nullable();
            $table->unsignedBigInteger('phase_id')->nullable();
            $table->boolean('Selected')->nullable();
            $table->string('Note_comit')->nullable();
            $table->boolean('Valide')->nullable();
            $table->boolean('Open_plis')->nullable();
            $table->date('Reception')->nullable();
            $table->string('Sort_recption')->nullable();
            $table->boolean('Finance')->nullable();
            $table->boolean('Actif')->nullable();
            $table->decimal('Total_Subv', 14, 2)->nullable();
            $table->decimal('Total_Apport', 14, 2)->nullable();
            $table->decimal('Total_Emprunt', 14, 2)->nullable();
            $table->decimal('Total_Invest', 14, 2)->nullable();
            $table->decimal('Tresor_depart', 14, 2)->nullable();
            $table->decimal('Total_CA_N1', 14, 2)->nullable();
            $table->decimal('Total_CA_N2', 14, 2)->nullable();
            $table->decimal('Total_CA_N3', 14, 2)->nullable();
            $table->decimal('Total_CA_N4', 14, 2)->nullable();
            $table->decimal('Total_CA_N5', 14, 2)->nullable();
            $table->decimal('Total_CA_N6', 14, 2)->nullable();
            $table->decimal('Total_CA_N7', 14, 2)->nullable();
            $table->decimal('Total_CH_N1', 14, 2)->nullable();
            $table->decimal('Total_CH_N2', 14, 2)->nullable();
            $table->decimal('Total_CH_N3', 14, 2)->nullable();
            $table->decimal('Total_CH_N4', 14, 2)->nullable();
            $table->decimal('Total_CH_N5', 14, 2)->nullable();
            $table->decimal('Total_CH_N6', 14, 2)->nullable();
            $table->decimal('Total_CH_N7', 14, 2)->nullable();
            $table->decimal('Total_Dot_N1', 14, 2)->nullable();
            $table->decimal('Total_Dot_N2', 14, 2)->nullable();
            $table->decimal('Total_Dot_N3', 14, 2)->nullable();
            $table->decimal('Total_Dot_N4', 14, 2)->nullable();
            $table->decimal('Total_Dot_N5', 14, 2)->nullable();
            $table->decimal('Total_Dot_N6', 14, 2)->nullable();
            $table->decimal('Total_Dot_N7', 14, 2)->nullable();
            $table->decimal('Total_CHVar_N1', 14, 2)->nullable();
            $table->decimal('Total_CHVar_N2', 14, 2)->nullable();
            $table->decimal('Total_CHVar_N3', 14, 2)->nullable();
            $table->decimal('Total_CHVar_N4', 14, 2)->nullable();
            $table->decimal('Total_CHVar_N5', 14, 2)->nullable();
            $table->decimal('Total_CHVar_N6', 14, 2)->nullable();
            $table->decimal('Total_CHVar_N7', 14, 2)->nullable();
            $table->decimal('Total_Int_N1', 14, 2)->nullable();
            $table->decimal('Total_Int_N2', 14, 2)->nullable();
            $table->decimal('Total_Int_N3', 14, 2)->nullable();
            $table->decimal('Total_Int_N4', 14, 2)->nullable();
            $table->decimal('Total_Int_N5', 14, 2)->nullable();
            $table->decimal('Total_Int_N6', 14, 2)->nullable();
            $table->decimal('Total_Int_N7', 14, 2)->nullable();
            $table->decimal('Total_Amort_N1', 14, 2)->nullable();
            $table->decimal('Total_Amort_N2', 14, 2)->nullable();
            $table->decimal('Total_Amort_N3', 14, 2)->nullable();
            $table->decimal('Total_Amort_N4', 14, 2)->nullable();
            $table->decimal('Total_Amort_N5', 14, 2)->nullable();
            $table->decimal('Total_Amort_N6', 14, 2)->nullable();
            $table->decimal('Total_Amort_N7', 14, 2)->nullable();
            $table->decimal('Total_Salaire_N1', 14, 2)->nullable();
            $table->decimal('Total_Salaire_N2', 14, 2)->nullable();
            $table->decimal('Total_Salaire_N3', 14, 2)->nullable();
            $table->decimal('Total_Salaire_N4', 14, 2)->nullable();
            $table->decimal('Total_Salaire_N5', 14, 2)->nullable();
            $table->decimal('Total_Salaire_N6', 14, 2)->nullable();
            $table->decimal('Total_Salaire_N7', 14, 2)->nullable();
            $table->decimal('Total_ChSociale_N1', 14, 2)->nullable();
            $table->decimal('Total_ChSociale_N2', 14, 2)->nullable();
            $table->decimal('Total_ChSociale_N3', 14, 2)->nullable();
            $table->decimal('Total_ChSociale_N4', 14, 2)->nullable();
            $table->decimal('Total_ChSociale_N5', 14, 2)->nullable();
            $table->decimal('Total_ChSociale_N6', 14, 2)->nullable();
            $table->decimal('Total_ChSociale_N7', 14, 2)->nullable();
            $table->decimal('Resultat_N1', 14, 2)->nullable();
            $table->decimal('Resultat_N2', 14, 2)->nullable();
            $table->decimal('Resultat_N3', 14, 2)->nullable();
            $table->decimal('Resultat_N4', 14, 2)->nullable();
            $table->decimal('Resultat_N5', 14, 2)->nullable();
            $table->decimal('Resultat_N6', 14, 2)->nullable();
            $table->decimal('Resultat_N7', 14, 2)->nullable();
            $table->decimal('Impot_N1', 14, 2)->nullable();
            $table->decimal('Impot_N2', 14, 2)->nullable();
            $table->decimal('Impot_N3', 14, 2)->nullable();
            $table->decimal('Impot_N4', 14, 2)->nullable();
            $table->decimal('Impot_N5', 14, 2)->nullable();
            $table->decimal('Impot_N6', 14, 2)->nullable();
            $table->decimal('Impot_N7', 14, 2)->nullable();
            $table->boolean('dispo_local')->nullable();
            $table->boolean('dispo_apport')->nullable();
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->string('adresse')->nullable();
            $table->unsignedBigInteger('secteur_actvite_id')->nullable();
            $table->string('composante')->nullable();
            $table->boolean('innov')->nullable();
            $table->text('motiv_obj')->nullable();
            $table->text('moti_obj_ar')->nullable();
            $table->integer('poste')->nullable();
            $table->decimal('resultat', 14, 2)->nullable();
            $table->decimal('ca', 14, 2)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
