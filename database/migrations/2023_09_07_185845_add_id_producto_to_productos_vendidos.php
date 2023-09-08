<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdProductoToProductosVendidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('productos_vendidos', function (Blueprint $table) {
        $table->unsignedBigInteger('id_producto')->nullable();
        $table->foreign('id_producto')->references('id')->on('productos');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos_vendidos', function (Blueprint $table) {
            //
        });
    }
}
