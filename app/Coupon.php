<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'qty', 'value', 'description', 'user_id', 'url', 'currency'
    ];

    public function details(){
        return $this->hasMany('App\CouponDetail');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function moneda(){
        if( $this->currency == 1 )
            return 'CMC';
        else if ( $this->currency == 2 )
            return 'VP';

        return 'N/A';
    }
}
