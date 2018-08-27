<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponDetail extends Model
{
    protected $fillable = [
        'coupon_id', 'code', 'status', 'user_id'
    ];

    public function coupon(){
        return $this->belongsTo('App\Coupon');
    }
}
