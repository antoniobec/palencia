<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColoresTextoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colores_textos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_color', 25)->default('blanco');
            $table->string('codigo_color', 7)->default('#ffffff');
            $table->boolean('activo')->default(true);
            $table->timestamp('created_at')->default(date('Y-m-d H:i:s'));
            $table->timestamp('updated_at')->default(date('Y-m-d H:i:s'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('colores_textos');
    }

}
