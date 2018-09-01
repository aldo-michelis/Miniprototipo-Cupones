<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\CouponDetail;
use App\Merchant;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;

class MerchantController extends Controller
{
    public function index(){
        $total = 0;
        $coupons = Coupon::with(['details' => function($query){
            $query->where('status', 1)->get();
        }])->where('user_id', Auth::id())->get();

        foreach ($coupons as $coupon) {
            foreach ($coupon->details as $detail) {
                $total += $coupon->value;
            }
        }
        return view('merchants.index',['total' => $total]);
    }

    public function registrar(){
        return view('merchants.registrar');
    }

    public function salvarRegistro(){
        $data = Input::all();
        $user = User::create($data);
        $data = array_merge($data,['user_id' => $user->id]);
        Merchant::create($data);
        Auth::guard()->login($user);
        return redirect()->route('login');
    }

    public function salvarCodigos(){

        $validator = Validator::make(Input::all(), [
            'qty' => 'required|numeric',
            'value' => 'required|numeric'
        ],[
            'qty.numeric' => 'La cantidad debe de ser un numero',
            'value.numeric'  => 'El valor debe de ser un numero',
        ]);

        if ($validator->fails()) {
            return redirect('comerciantes/agregar-codigos')
                ->withErrors($validator)
                ->withInput();
        }

        // TODO Validar que el valor acumulado de los cupones sea igual o menor a las monedas disponibles

        $cupon = Coupon::create(Input::all());

        return redirect()->route('negocios.index');
    }

    public function agregarCodigos()
    {
        $total = 0;
        $coupons = Coupon::with(['details' => function($query){
            $query->where('status', 1)->get();
        }])->where('user_id', Auth::id())->get();

        foreach ($coupons as $coupon) {
            foreach ($coupon->details as $detail) {
                $total += $coupon->value;
            }
        }

        return view('merchants.agregar',['total' => $total]);
    }

    public function validarCodigos()
    {
        $total = 0;
        $coupons = Coupon::with(['details' => function($query){
            $query->where('status', 1)->get();
        }])->where('user_id', Auth::id())->get();

        foreach ($coupons as $coupon) {
            foreach ($coupon->details as $detail) {
                $total += $coupon->value;
            }
        }

        return view('merchants.validar',['total' => $total]);
    }

    public function buscarCodigos()
    {
        $total = 0;
        $coupons = Coupon::with(['details' => function($query){
            $query->where('status', 1)->get();
        }])->where('user_id', Auth::id())->get();

        foreach ($coupons as $coupon) {
            foreach ($coupon->details as $detail) {
                $total += $coupon->value;
            }
        }

        if( Input::get('cupon_id') != '' ){
            $coupon = CouponDetail::where('id', Input::get('cupon_id'))->update([
                'status' => 1
            ]);

            return redirect()->route('negocios.index');
        }else {

            $search = Input::get('search');
            $coupon = CouponDetail::with('coupon')
                ->where('code', $search)
                ->first();

            if (isset($coupon)) {
                return view('merchants.validar', ['cupon' => $coupon, 'total' => $total]);
            } else {
                return "Codigo no Valido <a href=" . route('negocios.validar') . ">Regresar</a>";
            }
        }
    }

    public function preconfigurar(){
        $total = 0;
        $coupons = Coupon::with(['details' => function($query){
            $query->where('status', 1)->get();
        }])->where('user_id', Auth::id())->get();

        foreach ($coupons as $coupon) {
            foreach ($coupon->details as $detail) {
                $total += $coupon->value;
            }
        }
        return view('merchants.agregar',['preconf' => 1, 'total' => $total]);
    }

    public function promocionSalvar(){
        $cupon = Coupon::create(Input::all());
        return redirect()->route('promocion.ver');
    }

    public function verPromo($coupon_id){
        $total = 0;
        $coupons = Coupon::with(['details' => function($query){
            $query->where('status', 1)->get();
        }])->where('user_id', Auth::id())->get();

        foreach ($coupons as $coupon) {
            foreach ($coupon->details as $detail) {
                $total += $coupon->value;
            }
        }
        $coupon = Coupon::where('id', $coupon_id)->select('url')->first();

        return view('merchants.promocion',['total' => $total, 'enlace' => $coupon->url]);
    }
}
