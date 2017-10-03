<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuKienTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('su_kien_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('su_kien_id')->unsigned();
            $table->string('Ten');
            $table->longText('NoiDung');
            $table->text('TomTat')->nullable();;
             $table->string('DiaChi')->nullable();
            $table->string('locale');
            $table->unique(['su_kien_id','locale']);
            $table->foreign('su_kien_id')->references('id')->on('su_kien')->onDelete('cascade');
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
        Schema::dropIfExists('su_kien_translations');
    }
}
