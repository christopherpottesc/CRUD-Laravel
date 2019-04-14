<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBichosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bichos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('raca', 100);
            $table->string('proprietario', 100);
            $table->decimal('peso');
            $table->decimal('valor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bichos');
    }
}
