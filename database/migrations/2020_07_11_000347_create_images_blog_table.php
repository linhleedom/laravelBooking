<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_blog', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('blog_id')->index();
            $table->tinyInteger('status')->default(1);
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
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
        Schema::dropIfExists('images_blog');
    }
}
