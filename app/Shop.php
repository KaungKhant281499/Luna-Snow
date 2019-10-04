<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //Many Shops To One Township M-1 with Township
    public function townships(){
        return $this -> belongsTo("App\Township");
    }
}
