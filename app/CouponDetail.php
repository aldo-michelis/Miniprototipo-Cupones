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

    public function moneda(){
        if( $this->coupon->currency == 1 )
            return 'CMC';
        else if ( $this->coupon->currency == 2 )
            return 'VP';

        return 'N/A';
    }
}
