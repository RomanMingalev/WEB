<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        Schema::create('Kategoria', function (Blueprint $table) {          
            $table->increments('id');          
            $table->string('name',50);   
		
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {       
        Schema::drop('Kategoria');
    }
}
