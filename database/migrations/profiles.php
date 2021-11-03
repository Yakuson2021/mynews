<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     // title と body と image_path を追記
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->string('名前(name)');
            $table->string('性別(gender)'); // ニュースのタイトルを保存するカラム
            $table->string('趣味(hobby)');  // ニュースの本文を保存するカラム
             $table->string('自己紹介(introduction)');  // ニュースの本文を保存するカラム
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}