<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'qty', 'value', 'description', 'user_id'
    ];

    public function details(){
        return $this->hasMany('App\CouponDetail');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
