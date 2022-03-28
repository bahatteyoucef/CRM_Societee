<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id_client');
            $table->string('image_client');
            $table->string('adresse_client');
            $table->integer('willaya_client');
            $table->integer('commune_client');
            $table->string('reference_client');
            $table->string('nom_client');
            $table->string('telephone_client');
            $table->string('email_client');
            $table->integer('category_client');
            $table->integer('position_fiscal_client');
            $table->string('n_serie_client');
            $table->integer('nbr_employe_client');
            $table->float('chiffre_affaire_client');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
