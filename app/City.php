<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //Many Cities To One District M-1 with District
    public function districts(){
        return $this -> belongsTo("App\District");
    }

    //One City To Many Townships 1-M with Township
    public function townships(){
        return $this -> hasMany("App\Township");
    }
}
