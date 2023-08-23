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
        //productos
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("categoria_id");
            $table->unsignedBigInteger("marca_id");
            $table->unsignedBigInteger("proveedor_id");
            $table->string("nombre",100);
            $table->string("codigo",50)->nullable();
            $table->text("detalle")->nullable();
            $table->decimal("precio");
            $table->integer("stock");

            $table->foreign("categoria_id")->references("id")->on("categories");
            $table->foreign("marca_id")->references("id")->on("marks");
            $table->foreign("proveedor_id")->references("id")->on("suppliers");

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
