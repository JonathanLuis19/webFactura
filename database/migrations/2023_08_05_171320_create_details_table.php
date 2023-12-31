<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //detalles de la factura, la factura con el producto
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("factura_id");
            $table->unsignedBigInteger("producto_id");
            $table->integer("cantidad");
            $table->decimal("subtotal");
            $table->decimal("descuento");

            $table->foreign("factura_id")->references("id")->on("invoices");
            $table->foreign("producto_id")->references("id")->on("products");
            
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
        Schema::dropIfExists('details');
    }
}
