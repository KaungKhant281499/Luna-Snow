<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            //Create automated increment column for auction id (Primary Key)
            $table->increments('id');

            //Create string column for auction title
            $table->string('title');

            //Create string column for description
            $table->string('description');

            //Create string column for condition
            $table->string('condition');

            //Create string column for total bids
            $table->bigInteger('bids');

            //Create string column for enddate
            $table->string('enddate');

            //Create string column for endtime
            $table->string('endtime');

            //Create string column for soldout
            $table->string('soldout');
            
            //Create integer column for current price
            $table->bigInteger('currentprice');
        
            //Create string column for fix bidding for each
            $table->bigInteger('fixbid');

            //Create string column for final sale
            $table->bigInteger('finalsale');

            //Seller
            //Create integer column for user_id (Foreign Key)
            $table->unsignedInteger('user_id');
            //Assigned as foreign key on id column in Users table.
            $table->foreign("user_id")->references("id")->on("users")->onDelete("Cascade");

            //Buyer
            //Create integer column for customer_id (Foreign Key)
            $table->unsignedInteger('customer_id')->nullable();
            //Assigned as foreign key on id column in Customers table.
            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("Cascade");

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
        Schema::dropIfExists('auctions');
    }
}
