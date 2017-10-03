<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongNgheTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cong_nghe_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cong_nghe_id')->unsigned();
            $table->string('Ten');
            $table->longText('NoiDung');
            $table->string('locale');
            $table->unique(['cong_nghe_id','locale']);
            $table->foreign('cong_nghe_id')->references('id')->on('cong_nghe')->onDelete('cascade');
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
        Schema::dropIfExists('cong_nghe_translations');
    }
}
