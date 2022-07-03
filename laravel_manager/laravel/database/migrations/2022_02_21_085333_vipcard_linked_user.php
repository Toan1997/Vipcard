<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VipcardLinkedUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vipcard_linked_user', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('affiliate_id');
            $table->string('affiliate_link');
            $table->integer('record_id');
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
        Schema::dropIfExists('vipcard_linked_user');
    }
}
