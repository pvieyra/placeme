<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('name',120);
        $table->string('last_name',120);
        $table->string('second_last_name',120)->nullable();
        $table->string('email')->nullable();
        $table->string('phone',50);
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
        Schema::dropIfExists('customers');
    }
}
