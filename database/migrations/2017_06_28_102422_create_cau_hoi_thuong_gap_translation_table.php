<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCauHoiThuongGapTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cau_hoi_translations', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('cau_hoi_id')->unsigned();
            $table->longtext('CauHoi');
            $table->longtext('CauTraLoi');
            $table->string('locale');
            $table->unique(['cau_hoi_id','locale']);
            $table->foreign('cau_hoi_id')->references('id')->on('cau_hoi') ->onDelete('cascade');
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
        Schema::dropIfExists('cau_hoi_translations');
    }
}
