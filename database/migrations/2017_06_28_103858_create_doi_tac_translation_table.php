<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoiTacTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doi_tac_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doi_tac_id')->unsigned();
            $table->string('Ten');
            $table->longText('NoiDung');
            $table->string('locale');
            $table->unique(['doi_tac_id','locale']);
            $table->foreign('doi_tac_id')->references('id')->on('doi_tac')->onDelete('cascade');
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
        Schema::dropIfExists('doi_tac_translations');
    }
}
