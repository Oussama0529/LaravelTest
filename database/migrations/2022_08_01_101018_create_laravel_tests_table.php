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
        Schema::create('laraveltest', function (Blueprint $table) {
                $table->increments('ref');
                $table->string('detail_dechet');
                $table->double('masse_volumique',15,8);
                $table->string('cerfa');
                $table->string('niv1');
                $table->string('niv2');
                $table->string('unité');
                $table->double('longeur',15,8);
                $table->double('largeur',15,8);
                $table->double('epaisseur',15,8);
                $table->double('volume',15,8);
                $table->string('code_dechet');
                $table->string('lot');
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
        Schema::dropIfExists('laraveltest');
    }
};
