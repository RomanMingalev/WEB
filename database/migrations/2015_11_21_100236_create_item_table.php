<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {       
        Schema::create('Item', function (Blueprint $table) {          
            $table->increments('id');          
            $table->string('name',50);   
			$table->float('price'); 	
			$table->date('created');			
			$table->string('description',200);
			$table->boolean('nal');			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('Item');
    }
}
