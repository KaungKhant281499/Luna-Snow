<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    //Many Townships To One City M-1 with City
    public function cities(){
        return $this -> belongsTo("App\City");
    }

    //One Township To Many Customers 1-M with Customer
    public function customers(){
        return $this -> hasMany("App\Customer");
    }

    //One Township To Many Shops 1-M with Shop
    public function shops(){
        return $this -> hasMany("App\Shop");
    }
}
