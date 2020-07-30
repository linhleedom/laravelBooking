<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesHomestayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_homestay', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('homestay_id')->index();
            $table->tinyInteger('status')->default(1);
            $table->foreign('homestay_id')->references('id')->on('homestays')->onDelete('cascade');
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
        Schema::dropIfExists('images_homestay');
    }
}
