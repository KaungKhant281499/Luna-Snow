<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //Many Banks To One User M-1 with User
    public function users(){
        return $this -> belongsTo("App\User");
    }
}
