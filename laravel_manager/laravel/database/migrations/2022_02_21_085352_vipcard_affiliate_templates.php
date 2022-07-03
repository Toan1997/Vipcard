<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VipcardAffiliateTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vipcard_affiliate_templates', function (Blueprint $table) {
            $table->id();
            $table->string('affiliate_id');
            $table->string('affiliate_name');
            $table->string('affiliate_icon')->nullable();
            $table->string('affiliate_link')->nullable();
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
        Schema::dropIfExists('vipcard_affiliate_templates');
    }
}
