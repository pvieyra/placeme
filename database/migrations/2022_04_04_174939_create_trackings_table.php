<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema::create('trackings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->unsignedBigInteger('customer_id');
        $table->foreign('customer_id')->references('id')->on('customers');
        $table->unsignedBigInteger('building_id');
        $table->foreign('building_id')->references('id')->on('buildings');
        $table->unsignedBigInteger('state_id');
        $table->foreign('state_id')->references('id')->on('states');
        $table->string('numero_interior_unidad')->nullable();
        $table->string('contact_type');
        $table->string('inmobiliaria_name')->nullable();
        $table->string('nombre_asesor')->nullable();
        $table->string('celular_asesor')->nullable();
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
        Schema::dropIfExists('trackings');
    }
}
