<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function customer(){
        return User::where('id', $this->customer_id)->first();
    }

    public function merchant(){
        return User::where('id', $this->merchant_id)->first();
    }
}
