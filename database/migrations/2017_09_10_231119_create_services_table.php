<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services',function (Blueprint $table){
            $table->increments('id');
            $table->string('name','45');
            $table->string('phone','10');
            $table->integer('users_id');
            $table->string('razsocial','50');
            $table->string('seller','50');
            $table->string('sellerphone','10');
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
        Schema::dropIfExists('services');
    }
}
