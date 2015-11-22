<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Item', function(Blueprint $table)
{
    $table->string('img');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
   
    }
}
