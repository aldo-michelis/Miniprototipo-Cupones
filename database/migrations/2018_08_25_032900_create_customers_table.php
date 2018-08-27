<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            /*- Nombre Completo
- Celular (username)
- Contraseña
- Confirmar contraseña
- Checkbox para permanecer logeado*/
            $table->increments('id');
            $table->string('name');
            $table->string('contact_name');
            $table->string('phone');
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
        Schema::dropIfExists('customers');
    }
}
