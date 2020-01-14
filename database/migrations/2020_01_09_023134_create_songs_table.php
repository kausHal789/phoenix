<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('songs', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('user_id')->index();
      $table->string('title');
      $table->string('source');
      $table->string('writer');
      $table->string('producer');
      $table->text('description')->nullable();
      $table->unsignedBigInteger('category_id')->index();
      $table->string('image_url');
      $table->string('song_url');
      $table->string('duration');
      // How many time played.
      $table->integer('played')->nullable();

      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('songs');
  }
}
