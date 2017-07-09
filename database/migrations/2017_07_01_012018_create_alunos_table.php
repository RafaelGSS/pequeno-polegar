<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birth');
            $table->string('tel')->nullable();
            $table->integer('ra');
            $table->string('period');
            $table->enum('year',['Infantil 2', 'Pré 1', 'Pré 2', '1 ano', '2 ano', '3 ano', '4 ano', '5 ano']);
            $table->boolean('paid');
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
        Schema::dropIfExists('alunos');
    }
}
