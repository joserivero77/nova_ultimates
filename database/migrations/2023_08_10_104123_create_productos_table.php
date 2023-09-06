<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string("code")->unique()->nullable();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->decimal("precio_compra", 12, 2);
            $table->decimal("precio_venta", 12, 2);
            $table->decimal("stock", 12, 2)->default(0);//existencia
            $table->string('image')->nullable();
            $table->string('unit');
            $table->enum('status',['ACTIVE','DESACTIVED'])->default('ACTIVE');

            //$table->string('code')->unique()->nullable();

            //$table->string('description')->nullable();
            //$table->integer('stock')->default(0);//existencia

            //$table->float('price',12,2);//precio de venta
            //$table->float('purchase_price',12,2);//precio  de compra



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
        Schema::dropIfExists('productos');
    }
}
