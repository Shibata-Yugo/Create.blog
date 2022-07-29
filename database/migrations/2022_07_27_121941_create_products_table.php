<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
   {
       Schema::create('products', function (Blueprint $table) {
           $table->id(1);
           $table->string('name');  // ここから追記
           $table->text('description');
           $table->integer('price');
           $table->string('image');
           $table->integer('genre_id');  // ここまで追記
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
        Schema::dropIfExists('products');
    }
}
