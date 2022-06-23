<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->string('phone');  // 電話番号
      $table->string('address');  //住所
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
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('phone');  // 電話番号一応ですがね
      $table->dropColumn('address');  // 住所　一応、、
      $table->dropSoftDeletes();  
    });
  }
}
