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
            $table->string('code')->unique()->nullable();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->integer('stock')->default(0);//existencia
            $table->string('image')->nullable();
            $table->float('precio',12,2);//precio de venta
            $table->float('purchase_price',12,2);//precio  de compra
            $table->string('unit');
            $table->enum('status',['ACTIVE','DESACTIVED'])->default('ACTIVE');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

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
