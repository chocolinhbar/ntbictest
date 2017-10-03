<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToChucTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_chuc_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('to_chuc_id')->unsigned();
            $table->longText('GioiThieuChung');
            $table->longText('ViTriChucNang')->nullable();
            $table->longText('SuMenhTamNhin')->nullable();
            $table->longText('CoCau')->nullable();
            $table->longText('DoiNguTrungTam')->nullable();
            $table->string('locale');
            $table->unique(['to_chuc_id','locale']);
            $table->foreign('to_chuc_id')->references('id')->on('to_chuc')->onDelete('cascade');
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
        Schema::dropIfExists('to_chuc_translations');
    }
}
