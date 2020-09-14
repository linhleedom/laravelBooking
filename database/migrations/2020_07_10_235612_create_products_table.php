<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('homestay_id')->index();
            $table->unsignedBigInteger('room_type_id')->index();
            $table->string('name');
            $table->integer('prices');
            $table->integer('discount')->default(0);
            $table->string('avatar');
            $table->text('description')->nullabel();
            $table->tinyInteger('area');
            $table->tinyInteger('status')->default(1);
            $table->foreign('homestay_id')->references('id')->on('homestays')->onDelete('cascade');
            $table->foreign('room_type_id')->references('id')->on('room_types');
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
        Schema::dropIfExists('products');
    }
}
