<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['customer_id', 'merchant_id', 'amount', 'status'];

    public function customer(){
        return $this->hasOne('App\User', 'id', 'customer_id');
    }

    public function merchant(){
        return $this->hasOne('App\User', 'id', 'merchant_id');
    }
}
