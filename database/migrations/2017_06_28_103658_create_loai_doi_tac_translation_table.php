<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiDoiTacTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_doi_tac_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loai_doi_tac_id')->unsigned();
            $table->string('Ten');
            $table->string('locale');
            $table->unique(['loai_doi_tac_id','locale']);
            $table->foreign('loai_doi_tac_id')->references('id')->on('loai_doi_tac') ->onDelete('cascade');;
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
        Schema::dropIfExists('loai_doi_tac_translations');
    }
}
