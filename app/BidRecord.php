<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidRecord extends Model
{
    //Many User To Many Auctions M-M with Auction
    public function auctions(){
        return $this -> belongsToMany("App\Auction");
    }

    //Many User To Many BidRecords M-M with Customers
    public function customers(){
        return $this -> belongsToMany("App\Auction");
    }
}
