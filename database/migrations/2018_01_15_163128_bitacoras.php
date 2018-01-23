<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bitacoras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('user_id')->unsigned();
            $table->string('ticket',50)->nullable();
            $table->string('ticketraiz',50)->nullable();
            $table->string('detectado',50);
            $table->string('telrepor',11);
            $table->integer('responsable')->unsigned();
            $table->integer('impacto')->unsigned();
            $table->integer('reportado')->unsigned();
            $table->integer('escalamiento')->unsigned();            
            $table->integer('estatus')->unsigned();
            $table->string('origen',500);
            $table->string('sintoma',500);   
            $table->string('observacion',2000);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');            
            $table->foreign('responsable')->references('id')->on('responsables')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('impacto')->references('id')->on('impactos')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('reportado')->references('id')->on('reportados')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('escalamiento')->references('id')->on('escalamientos')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estatus')->references('id')->on('estatus')
                ->onUpdate('cascade')->onDelete('cascade');
           
        });

        Schema::create('bita_eventos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_bita')->unsigned();
            $table->integer('id_inci')->unsigned();
            $table->integer('id_evento')->unsigned();
            $table->dateTime('fec_detect');
            $table->dateTime('fec_repor');
            $table->dateTime('fec_initicket');
            $table->dateTime('fec_culmina');
            $table->timestamps();

            $table->foreign('id_bita')->references('id')->on('bitacoras')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_inci')->references('id')->on('incidencias')
                ->onUpdate('cascade')->onDelete('cascade');            
            $table->foreign('id_evento')->references('id')->on('eventos')
                ->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('bita_unidad', function (blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_bita')->unsigned();
            $table->integer('id_unidad')->unsigned();
            $table->timestamps();

            $table->foreign('id_bita')->references('id')->on('bitacoras')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_unidad')->references('id')->on('unidad')
                ->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('certificacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bita')->unsigned();
            $table->string('certificado',2);
            $table->integer('certificado_por')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('id_bita')->references('id')->on('bitacoras')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('certificado_por')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('actualizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bita')->unsigned();
            $table->integer('usuario')->unsigned();
            $table->integer('proveedor')->unsigned();
            $table->timestamps();

            $table->foreign('id_bita')->references('id')->on('bitacoras')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('usuario')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('proveedor')->references('id')->on('proveedores')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

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
