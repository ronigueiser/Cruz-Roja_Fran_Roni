<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *COntiene las instrucciones con las modificaciones que queremos realizar en la base de datos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id("curso_id");
            $table->string('nombre');
            $table->text('descripcion');
            $table->unsignedInteger('precio');
            $table->string('portada', 255)->nullable();
            $table->string('portada_descripcion', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Contiene las instrucciones para deshacer las modificaciones realizadas en el metodo "up()"
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
