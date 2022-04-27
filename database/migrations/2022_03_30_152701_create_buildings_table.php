<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('buildings', function (Blueprint $table) {
      $table->id();
      $table->string('building_code')->unique();
      $table->string('address');
      $table->string('suburb');
      $table->string('municipality');
      $table->string('int_number',50)->nullable();
      $table->string('zip',50)->nullable();
      $table->string('alias')->nullable();
      $table->text('comments')->nullable();
      $table->integer('active')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('buildings');
  }
}
