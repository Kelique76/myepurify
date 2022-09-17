<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText('small_desc')->nullable();
            $table->longText('desc')->nullable();
            $table->integer('ori_price');
            $table->integer('selli_price');
            $table->integer('quantity');
            $table->tinyInteger('trending')->default('0')->comment('1: trend, 0: notrend');
            $table->tinyInteger('status')->default('0')->comment('1: pasif, 0: active');
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_key')->nullable();
            $table->mediumText('meta_desc')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
};
