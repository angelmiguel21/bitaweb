<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class listas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inci_desc',100);
            $table->timestamps();
        });

        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_inci')->unsigned();
            $table->string('even_desc',100);
            $table->timestamps();

            $table->foreign('id_inci')->references('id')->on('incidencias')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unidad',100);
            $table->timestamps();
        });

        Schema::create('responsables', function(Blueprint $table) {
            $table->increments('id');
            $table->string('resp_desc', 50);
            $table->timestamps();
        });

        Schema::create('reportados', function(Blueprint $table) {
            $table->increments('id');
            $table->string('repor_desc', 50);
            $table->timestamps();
        });

        Schema::create('estatus', function(Blueprint $table) {
            $table->increments('id');
            $table->string('est_desc',50);
            $table->timestamps();
        });

        Schema::create('impactos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('impac_desc', 50);
            $table->timestamps();
        });

        Schema::create('escalamientos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('esca_desc',50);
            $table->timestamps();
        });

        Schema::create('proveedores', function(Blueprint $table) {
            $table->increments('id');
            $table->string('prove_desc',50);
            $table->timestamps();
        });        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
