<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('keyword_id')->unsigned()->index();
            $table->foreign('keyword_id')->references('id')->on('keywords')->onDelete('cascade');
            
            $table->bigInteger('news_id')->unsigned()->index();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keyword_news');
    }
};
