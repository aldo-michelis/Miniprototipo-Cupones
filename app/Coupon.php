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

    public function moneda($explain = false){
        $ret = '';
        if( $this->currency == 1 ) {
            $ret .= 'CD';

            if( $explain )
                $ret .= ' (Cupon de Descuento)';
        }
        else if ( $this->currency == 2 ){
            $ret .= 'MC';

            if( $explain )
                $ret .= ' (Cheque de Monedas Corrientes)';
        }
        return $ret;
    }
}
