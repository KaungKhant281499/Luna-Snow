<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            //Create automated increment column for city id (Primary Key)
            $table->increments('id');

            //Create string column for city name
            $table->string('name');

            //Create integer column for district_id (Foreign Key)
            $table->unsignedInteger('district_id');
            //Assigned as foreign key on id column in Districts table.
            $table->foreign("district_id")->references("id")->on("districts")->onDelete("Cascade");

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
        Schema::dropIfExists('cities');
    }
}
