<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            //Create automated increment column for bank id (Primary Key)
            $table->increments('id');

            //Create string column for card type
            $table->string('type');

            //Create string column for card number
            $table->string('cardno');
            
            //Create integer column for balance
            $table->bigInteger('balance');

            //Create string column for cvv of card
            $table->string('cvv');

            //Create string column for expdate of card
            $table->string('exp');

            //Create integer column for user_id (Foreign Key)
            $table->unsignedInteger('user_id');
            //Assigned as foreign key on id column in Users table.
            $table->foreign("user_id")->references("id")->on("users")->onDelete("Cascade");

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
        Schema::dropIfExists('banks');
    }
}
