<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //proveedores 
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string("n_identidad",50);
            $table->string("entidad",100);
            $table->text("descripcion")->nullable();
            $table->string("direccion",200);
            $table->string("telefono",20);
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
        Schema::dropIfExists('suppliers');
    }
}
