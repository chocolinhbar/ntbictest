<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinTucTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_tuc_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tin_tuc_id')->unsigned();
            $table->string('Ten');
            $table->longText('NoiDung');
            $table->text('TomTat');
            $table->string('locale');
            $table->unique(['tin_tuc_id','locale']);
            $table->foreign('tin_tuc_id')->references('id')->on('tin_tuc')->onDelete('cascade');
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
        Schema::dropIfExists('tin_tuc_translations');
    }
}
