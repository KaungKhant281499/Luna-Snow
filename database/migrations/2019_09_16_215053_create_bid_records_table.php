<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_records', function (Blueprint $table) {
            //Create automated increment column for bid record (Primary Key)
            $table->increments('id');
            
            //Create integer column for auction_id (Foreign Key)
            $table->unsignedInteger('auction_id');
            //Assigned as foreign key on id column in Auctions table.
            $table->foreign("auction_id")->references("id")->on("auctions")->onDelete("Cascade");
            
            //Create integer column for customer_id (Foreign Key)
            $table->unsignedInteger('customer_id');
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
        Schema::dropIfExists('bid_records');
    }
}
