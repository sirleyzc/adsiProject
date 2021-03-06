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
            $table->foreignId('idHarvest')->constrained('harvests');
            $table->string('timHarv');
            $table->integer('kilos');
            $table->decimal('timValue', 10, 2);
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
        Schema::dropIfExists('det_harvests');
    }
}
