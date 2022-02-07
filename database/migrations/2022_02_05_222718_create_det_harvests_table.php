<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetHarvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_harvests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('idHarvest')->constrained('harvests');
            $table->char('timHarvest', 1);
            $table->integer('kilos');
            $table->decimal('timValue', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('det_harvests');
    }
}
