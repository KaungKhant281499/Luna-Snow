<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //Many Customers To One Township M-1 with Township
    public function townships(){
        return $this -> belongsTo("App\Township");
    }

    //One Customer To Many Auctions 1-M with Auction
    public function auctions(){
        return $this -> hasMany("App\Auction");
    }

    //Many User To Many Customers M-M with BidRecord
    public function bidrecords(){
        return $this -> hasMany("App\BidRecord");
    }
}
