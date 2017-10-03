<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChuyenGiaTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuyen_gia_translations', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('chuyen_gia_id')->unsigned();
            $table->string('Ten');
            $table->string('ChucVu')->nullable();
            $table->string('locale');
            $table->unique(['chuyen_gia_id','locale']);
            $table->foreign('chuyen_gia_id')->references('id')->on('chuyen_gia')->onDelete('cascade');
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
        Schema::dropIfExists('chuyen_gia_translations');
    }
}
