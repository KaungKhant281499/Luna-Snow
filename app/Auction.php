<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    //Many Auctions To One User M-1 with User
    public function users(){
        return $this -> belongsTo("App\User");
    }

    //Many Auctions To One Customer M-1 with Customer
    public function customers(){
        return $this -> belongsTo("App\Customer");
    }

    //Many User To Many Auctions M-M with BidRecord
    public function bidrecords(){
        return $this -> hasMany("App\BidRecord");
    }
}
