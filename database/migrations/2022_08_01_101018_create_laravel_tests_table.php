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
        Schema::create('LaravelTest', function (Blueprint $table) {
                $table->increments('ref');
                $table->string('detail_dechet');
                $table->float('masse_volumique',8,2);
                $table->string('cerfa');
                $table->string('niv1');
                $table->string('niv2');
                $table->string('unité');
                $table->float('longeur',8,2);
                $table->float('largeur',8,2);
                $table->float('epaisseur',8,2);
                $table->float('volume',8,2);
                $table->integer('code_dechet');
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
        Schema::dropIfExists('laravelTest');
    }
};
