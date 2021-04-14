<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->default('received');
            $table->dateTime('date_od_received');
            $table->string('serial_number');
            $table->string('equipment');
            $table->string('description');
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')
                ->references('id')->on('clientes')
                ->onDelete('cascade');
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
       Schema::create('services', function (Blueprint $table) {
            Schema::dropIfExists('services');
        });
    }
}
