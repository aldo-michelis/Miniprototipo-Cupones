<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function customer(){
        return $this->hasOne('App\User', 'id', 'cutomer_id');
    }

    public function merchant(){
        return $this->hasOne('App\User', 'id', 'merchant_id');
    }
}
