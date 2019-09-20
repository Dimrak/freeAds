<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('title');
           $table->text('content');
           $table->string('image')->nullable();
           $table->boolean('active')->default(1);
           $table->float('price')->nullable();
           $table->integer('user_id');
           $table->integer('city_id');
           $table->integer('cat_id');
           $table->string('slug');
           $table->integer('status')->default(1);
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
        Schema::dropIfExists('adverts');
    }
}
