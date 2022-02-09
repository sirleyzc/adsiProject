<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idOrder')->constrained('orders');
            $table->integer('amount');
            $table->string('variety');
            $table->decimal('loadValue', 10, 2);
            $table->string('description', 200);
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
        Schema::dropIfExists('det_orders');
    }
}
