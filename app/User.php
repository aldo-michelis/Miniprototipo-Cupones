<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Symfony\Component\Console\Output\ConsoleOutput;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'user_type', 'mc_saldo', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function merchant(){
        if( $this->user_type == 1 )
            return $this->hasOne('App\Merchant');

        return null;
    }

    public function coupon(){
        return $this->hasMany('App\Coupon');
    }

    public function dispenser(){
        if( $this->user_type == 1 )
            return $this->hasMany('App\Dispenser');

        return null;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function unico(){

    }

    public function tieneCuponesActivos(){
        $cpns = CouponDetail::where('user_id', $this->id)->where('status', 0)->get();
        return (count($cpns) == 0);
    }

    public function totalDePromociones(){
        if ($this->user_type == 2)
            $total = Coupon::join('coupon_details', 'coupons.id', 'coupon_details.coupon_id')
                            ->where('coupon_details.status', 1)
                            ->where('coupon_details.user_id', $this->id)
                            ->where('coupons.currency', 1)
                            ->select('value')->sum('value');
        else
            $total = Coupon::join('coupon_details', 'coupons.id', 'coupon_details.coupon_id')
                ->where('coupons.user_id', $this->id)
                ->where('coupons.currency', 1)
                ->where('coupon_details.status', 1)
                ->select('value')->sum('value');

        return $total;
    }

    public function totalDeCompraVentas(){
            if ($this->user_type == 2)
                $total = Coupon::join('coupon_details', 'coupons.id', 'coupon_details.coupon_id')
                                ->where('coupon_details.status', 1)
                                ->where('coupon_details.user_id', $this->id)
                                ->select('value')->sum('value');
            else
                $total = Coupon::join('coupon_details', 'coupons.id', 'coupon_details.coupon_id')
                    ->where('coupons.user_id', $this->id)
                    ->where('coupon_details.status', 1)
                    ->select('value')->sum('value');

            return $total;
        }

    public function merchantImage(){
        if( $this->user_type == 1 ) {
            $merchant = $this->merchant;
            return $merchant;
        }else {
            return 'images/default.jpeg';
        }
    }

    public function tieneSlotsLibres(){
        $slots = Slot::where('coupon_id', 0)->where('user_id', auth()->id())->get();
        return (count($slots) > 0);
    }

    public function tieneSlots(){
        $slots = Slot::where('user_id', auth()->id())->get();
        return (count($slots) > 0);
    }
}
