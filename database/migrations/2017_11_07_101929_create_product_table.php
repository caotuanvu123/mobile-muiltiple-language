<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image',1000);
            $table->integer('quantity');
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('price');
            $table->integer('promotion');
            $table->string('name_vi',500);
            $table->string('desc_vi',1500);
            $table->string('name_en',500);
            $table->string('desc_en',1500);
            $table->timestamps();
        });
        Schema::table(
            'product',
            function ($table) {
                $table->foreign('category_id')->references('id')->on('categories')
                    ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('brand_id')->references('id')->on('brands')
                    ->onUpdate('cascade')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
