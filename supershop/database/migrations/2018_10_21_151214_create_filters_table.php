<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('measure', 30)->nullable();
            $table->string('allowable_values')->nullable();
            $table->enum('type', ['str', 'bool', 'num']);
            $table->unsignedInteger('category_id');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });

        Schema::create('filter_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('filter_id');
            $table->unsignedInteger('product_id');
            $table->string('value', 30);

            $table->foreign('filter_id')
                ->references('id')->on('filters')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filters');
        Schema::dropIfExists('filter_product');
    }
}
