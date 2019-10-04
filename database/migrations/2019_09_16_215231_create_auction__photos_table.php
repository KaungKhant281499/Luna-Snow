<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction__photos', function (Blueprint $table) {
            //Create automated increment column for row id (Primary Key)
            $table->increments('id');
            
            //Create integer column for auction_id (Foreign Key)
            $table->unsignedInteger('auction_id');
            //Assigned as foreign key on id column in Auctions table.
            $table->foreign("auction_id")->references("id")->on("auctions")->onDelete("Cascade");

            //Create integer column for photo_id (Foreign Key)
            $table->unsignedInteger('photo_id');
            //Assigned as foreign key on id column in Photos table.
            $table->foreign("photo_id")->references("id")->on("photos")->onDelete("Cascade");

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
        Schema::dropIfExists('auction__photos');
    }
}
