<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //factura
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("cliente_id");
            $table->unsignedBigInteger("pago_id");
            $table->string("n_factura");
            $table->decimal("iva");
            $table->decimal("total");
            $table->string("idtransaccion");

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("cliente_id")->references("id")->on("customers");
            $table->foreign("pago_id")->references("id")->on("payment_methods");
            
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
        Schema::dropIfExists('invoices');
    }
}
