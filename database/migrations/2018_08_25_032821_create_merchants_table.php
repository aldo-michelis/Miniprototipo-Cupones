<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            /*- Nombre de la empresa
- Nombre del contacto
- Teléfono del contacto (username)
- Giro
- CP
- Password
- Confirmar Password*/
            $table->increments('id');
            $table->string('contact_name');
            $table->string('brand');
            $table->string('postalcode');
            $table->integer('user_id');
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
        Schema::dropIfExists('merchants');
    }
}
