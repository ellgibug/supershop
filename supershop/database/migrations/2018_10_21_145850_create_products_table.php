<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('vendor', 7)->unique();
            $table->string('name', 100);
            $table->string('slug', 100)->unique();
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('category_id');
            $table->integer('price');
            $table->integer('qty');
            $table->string('label', 20)->nullable();

            $table->foreign('category_id')
                ->references('id')->on('categories');

            $table->foreign('brand_id')
                ->references('id')->on('brands');
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
