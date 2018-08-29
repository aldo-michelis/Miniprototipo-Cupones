<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            /*
             *  - Cantidad de cupones
                - Valor de cada cupón
                - Descripción de la promoción de texto libre.
            */
            $table->increments('id');
            $table->integer('qty');
            $table->decimal('value');
            $table->text('description');
            $table->integer('user_id');
            $table->string('url')->default('#');
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
        Schema::dropIfExists('coupons');
    }
}
