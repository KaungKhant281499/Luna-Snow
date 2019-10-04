<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            //Create automated increment column for shop id (Primary Key)
            $table->increments('id');

            //Create string column for shop name
            $table->string('name');

            //Create string column for shop photo
            $table->string('photo');
            
            //Create integer column for address
            $table->bigInteger('address');
        
            //Create integer column for township_id (Foreign Key)
            $table->unsignedInteger('township_id');
            //Assigned as foreign key on id column in Townships table.
            $table->foreign("township_id")->references("id")->on("townships")->onDelete("Cascade");

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
        Schema::dropIfExists('shops');
    }
}
