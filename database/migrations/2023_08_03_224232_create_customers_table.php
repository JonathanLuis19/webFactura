<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //clientes
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("cedula",15)->unique();
            $table->string("nombre",100);
            $table->string("direccion",200);
            $table->string("telefono",20);
            $table->string("email",50)->unique()->nullable();
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
        Schema::dropIfExists('customers');
    }
}
