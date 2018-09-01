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

    public function user(){
        $coupon = Coupon::where('id', $this->coupon_id)->first();
        return User::where('id', $coupon->user_id)->first();
    }

    public function moneda($explain = null){
        return $this->coupon->moneda($explain);
    }
}
