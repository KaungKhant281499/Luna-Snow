<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTownshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('townships', function (Blueprint $table) {
            //Create automated increment column for township id (Primary Key)
            $table->increments('id');

            //Create string column for township name
            $table->string('name');

            //Create integer column for city_id (Foreign Key)
            $table->unsignedInteger('city_id');
            //Assigned as foreign key on id column in Cities table.
            $table->foreign("city_id")->references("id")->on("cities")->onDelete("Cascade");

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
        Schema::dropIfExists('townships');
    }
}
