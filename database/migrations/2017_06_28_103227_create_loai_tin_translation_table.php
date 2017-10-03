<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiTinTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_tin_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loai_tin_id')->unsigned();
            $table->string('Ten');
            $table->string('locale');
            $table->unique(['loai_tin_id','locale']);
            $table->foreign('loai_tin_id')->references('id')->on('loai_tin') ->onDelete('cascade');
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
        Schema::dropIfExists('loai_tin_translations');
    }
}
