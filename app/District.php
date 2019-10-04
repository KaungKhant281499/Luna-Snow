<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //One District To Many Cities 1-M with City
    public function cities(){
        return $this -> hasMany("App\City");
    }
}
