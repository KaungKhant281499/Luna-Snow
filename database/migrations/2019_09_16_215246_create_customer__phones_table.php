<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer__phones', function (Blueprint $table) {
            //Create automated increment column for row id (Primary Key)
            $table->increments('id');
            
            //Create integer column for phone_id (Foreign Key)
            $table->unsignedInteger('phone_id');
            //Assigned as foreign key on id column in Phones table.
            $table->foreign("phone_id")->references("id")->on("phones")->onDelete("Cascade");

            //Create integer column for photo_id (Foreign Key)
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
        Schema::dropIfExists('customer__phones');
    }
}
