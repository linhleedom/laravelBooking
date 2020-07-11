<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('homestay_id')->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->tinyInteger('point');
            $table->text('comment');
            $table->tinyInteger('status')->default(0);
            $table->foreign('homestay_id')->references('id')->on('homestays')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('ratings');
    }
}
