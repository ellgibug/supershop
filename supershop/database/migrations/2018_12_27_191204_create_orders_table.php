<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number', 30)->unique();
            $table->unsignedInteger('user_id');
            $table->enum('delivery_type', [1, 2]); // 1- самовывоз, 2 - курьер
            $table->string('address', 255);
            $table->string('zip', 6);
            $table->enum('payment_type', [1, 2]); // 1- картой онлайн, 2 - наличными курьеру
            $table->float('total_before');
            $table->float('total_after');
            $table->string('coupon', 10)->nullable();
            $table->string('users_comment', 255)->nullable();
            $table->string('managers_comment', 255)->nullable();
            $table->enum('delivery_status', [1, 2, 3, 4, 5]); // принят к сборке, собирается, передан курьеру, в пути, доставлен
            $table->boolean('payment_status');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->integer('qty');

            $table->foreign('order_id')
                ->references('id')->on('orders')
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
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_product');
    }
}
