<?php

namespace App\Http\Controllers;

use App\CouponDetail;
use App\User;
use App\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Faker;

class CustomerController extends Controller
{
    public function index(){
        $total = 0;
        $details = CouponDetail::with('coupon')
            ->where('status', 1)
            ->where('user_id', Auth::id())
            ->get();

        foreach ( $details as $detail ) {
                $total += $detail->coupon->value;
        }
        return view('customers.index',['total' => $total]);
    }

    public function registrar(){
        return view('customers.registrar');
    }

    public function salvarRegistro(){
        User::create(Input::all());
        return redirect()->route('login');
    }

    public function listarCodigos()
    {
        $total = 0;
        $details = CouponDetail::with('coupon')
            ->where('status', 1)
            ->where('user_id', Auth::id())
            ->get();

        foreach ( $details as $detail ) {
            $total += $detail->coupon->value;
        }
        $cuopons = Coupon::with('user')->get();
        return view('customers.listar',['cuopons' => $cuopons,'total' => $total]);
    }

    public function cupon($id){
        $total = 0;
        $details = CouponDetail::with('coupon')
            ->where('status', 1)
            ->where('user_id', Auth::id())
            ->get();

        foreach ( $details as $detail ) {
            $total += $detail->coupon->value;
        }

        // TODO Revisar que se contabilicer la cantidad de cupones disponibles.

        $check = CouponDetail::where('coupon_id', $id)->where('user_id', Auth::id())->get();
        if( count($check) > 0 ){
            return redirect()->route('clientes.listar');
        }else{
            $faker = Faker\Factory::create();
            CouponDetail::create([
                'coupon_id' => $id,
                'code' => $faker->word,
                'status' => 0,
                'user_id' => Auth::id()
            ]);
            $coupon = Coupon::with(['user','details'])->where('id', $id)->first();
            return view('customers.cupon', ['coupon' => $coupon,'total' => $total]);
        }
    }
}
