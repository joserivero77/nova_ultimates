<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoCompradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_comprados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_compra");
            $table->foreign("id_compra")
                ->references("id")
                ->on("compras")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string("description");
            $table->string("code");
            $table->decimal("precio", 12, 2);
            $table->decimal("cantidad", 12, 2);

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
        Schema::dropIfExists('producto_comprados');
    }
}
