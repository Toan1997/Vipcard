<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VipcardUserManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vipcard_user_management', function (Blueprint $table) {
            $table->id();
            $table->string('link_user');
            $table->string('name');
            $table->string('phone');
            $table->string('greeting');
            $table->string('link_avatar')->nullable();
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
        Schema::dropIfExists('vipcard_user_management');
    }
}
