<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuyenDungTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuyen_dung_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tuyen_dung_id')->unsigned();
            $table->string('MoTa');
            $table->longtext('NoiDungTuyenDung');
            $table->string('locale');
            $table->unique(['tuyen_dung_id','locale']);
            $table->foreign('tuyen_dung_id')->references('id')->on('tuyen_dung')->onDelete('cascade');
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
        Schema::dropIfExists('tuyen_dung_translations');
    }
}
