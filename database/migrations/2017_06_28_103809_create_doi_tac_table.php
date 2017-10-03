<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoiTacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doi_tac', function(Blueprint $table) {
            $table->increments('id');
            $table->text('HinhAnh');
            $table->string('slug');
            $table->integer('loai_doi_tac_id')->unsigned();
            $table->foreign('loai_doi_tac_id')->references('id')->on('loai_doi_tac') ->onDelete('cascade');
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
        Schema::dropIfExists('doi_tac');
    }
}
