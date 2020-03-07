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

      $table->unsignedBigInteger('album_id')->index();
      $table->string('title');
      $table->string('source');
      $table->string('writer');
      $table->string('producer');
      // $table->text('description')->nullable();
      $table->unsignedBigInteger('category_id')->index();
      // $table->text('image_url');
      $table->text('song_url');
      $table->string('duration');
      // How many time played.
      $table->integer('listener')->default(0);

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
