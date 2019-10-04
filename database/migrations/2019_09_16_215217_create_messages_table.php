<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            //Create automated increment column for message id (Primary Key)
            $table->increments('id');
            
            //Create integer column for sender_id 
            $table->integer('sender_id');

            //Create integer column for receiever_id 
            $table->integer('receiever_id');

            //Create integer column for receiever_id 
            $table->string('message');

            //Create timestamps for data updating record
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
        Schema::dropIfExists('messages');
    }
}
