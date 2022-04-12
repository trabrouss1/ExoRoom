<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('date_naissance');
            $table->string('lieu_naissance');
            $table->string('lieu_habitation');
            $table->string('contact')->nullable();
            $table->string('nom_pere')->nullable();
            $table->string('prenom_pere')->nullable();
            $table->string('profession_pere')->nullable();
            $table->string('contact_pere')->nullable();
            $table->string('lieu_habitation_pere')->nullable();
            $table->string('nom_mere')->nullable();
            $table->string('prenom_mere')->nullable();
            $table->string('profession_mere')->nullable();
            $table->string('contact_mere')->nullable();
            $table->string('lieu_habitation_mere')->nullable();

            $table->unsignedBigInteger('niveau_id');
            $table->foreign('niveau_id')->references('id')->on('niveaux');

            $table->boolean('isDeleted')->default(false);

            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
};