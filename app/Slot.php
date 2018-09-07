<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = ['user_id','merchant_id','coupon_id', 'cad', 'status'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function merchant(){
        return $this->hasOne('App\User', 'id', 'merchant_id');
    }

    public function detail(){
        return $this->hasOne('App\CouponDetail', 'id', 'coupon_id');
    }
}
