<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('tracking_id');
        $table->foreign('tracking_id')->references('id')->on('trackings');
        $table->unsignedBigInteger('state_id');
        $table->foreign('state_id')->references('id')->on('states');
        $table->string('subject');
        $table->text('comments');
        $table->timestamp('tracking_date');
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
        Schema::dropIfExists('comments');
    }
}
