<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSortDeleteColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('homestays', function(Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('products', function(Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('blogs', function(Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('images_homestay', function(Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('bills', function(Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('orders', function(Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('ratings', function(Blueprint $table) {
            $table->dropColumn('user_id');
            $table->softDeletes();
        });
        Schema::table('slides', function(Blueprint $table) {
            $table->string('order')->nullable();
            $table->string('slogan2')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('homestays', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('products', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('blogs', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('images_homestay', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('bills', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('orders', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('ratings', function(Blueprint $table) {
            $table->bigInteger('user_id')->nullable()->index()->default(0);
            $table->dropColumn('deleted_at');
        });
        Schema::table('slides', function(Blueprint $table) {
            $table->dropColumn('order');
            $table->dropColumn('slogan2');
            $table->dropColumn('deleted_at');
        });
    }
}
