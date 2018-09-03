<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\CouponDetail;
use App\Merchant;
use App\Payment;
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
        $data = Input::all();

        $validator = Validator::make($data, [
            'qty' => 'required|numeric',
            'value' => 'required|numeric'
        ],[
            'qty.numeric' => 'La cantidad debe de ser un numero',
            'value.numeric'  => 'El valor debe de ser un numero',
        ]);

        if ($validator->fails()) {
            return redirect('negocios/agregar-codigos')
                ->withErrors($validator)
                ->withInput();
        }

        if( $data['currency'] == 2 ){
            $monto = $data['value'];
            $qty = $data['qty'];
            $saldo = $data['mc_saldo'];

            if( ($monto * $qty) >= $saldo ) {
                return redirect('negocios/agregar-codigos')
                        ->withErrors(['error' => 'No tiene saldo para esta cantidad de cupones'])
                        ->withInput();
            }
            $user = auth()->user();
            $user->mc_saldo -= ($monto * $qty);
            $user->save();
        }

        $cupon = Coupon::create($data);

        return redirect()->route('negocios.index');
    }

    public function agregarCodigos()
    {
        return view('merchants.agregar');
    }

    public function validarCodigos()
    {
        return view('merchants.validar');
    }

    public function buscarCodigos()
    {
        if( Input::get('cupon_id') != '' ) {
            $id = Auth::id();
            $coupon = CouponDetail::with(['coupon' => function ($query) use ($id) {
                $query->where('user_id', $id)->first();
            }])->where('id', Input::get('cupon_id'))->first();

            // TODO actualizar los saldos de las cuentas de los usuarios involucrados
            $coupon->status = 1;
            $coupon->save();

            if( $coupon->coupon->currency == 2 ){
                $user = User::find($coupon->user_id);
                $user->mc_saldo +=  $coupon->coupon->value;
                $user->save();
            }

            return view('merchants.validar');
        }else {
            $id = Auth::id();
            $search = Input::get('search');
            $coupon = CouponDetail::with(['coupon' => function ($query) use ($id) {
                $query->where('user_id', $id)->first();
            }])->where('code', $search)->first();
            if (isset($coupon->coupon)) {
                return view('merchants.validar', ['cupon' => $coupon]);
            } else {
                return view('merchants.validar', ['none' => true]);
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
        return redirect()->route('promocion.ver',['id' => $cupon->id]);
    }

    public function verPromo($coupon_id){
        $coupon = Coupon::where('id', $coupon_id)->select('url')->first();
        return view('merchants.promocion',['enlace' => $coupon->url]);
    }

    public function verCobros(){
        $payments = Payment::where('merchant_id', auth()->id())->get();
        return view('merchants.cobrar',['payments' => $payments]);
    }

    public function marcarCobros(){
        $id = Input::get('id');
        $payment = Payment::where('id', $id)->update([
            'status' => 1
        ]);
        return response()->json(['status' => $payment]);
    }
}
