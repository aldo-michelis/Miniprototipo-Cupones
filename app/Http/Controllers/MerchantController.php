<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\CouponDetail;
use App\Dispenser;
use App\Merchant;
use App\Payment;
use App\User;
use App\Slot;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

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
	
	    $validator = Validator::make($data, [
            'username' => 'required|email|unique:users,username',
            'password' => 'required|same:password_confirm',
        ],[
            'username.required' => 'El correo debe de estar presente.',
            'username.email'    => 'Por favor inserte un correo valido.',
            'username.unique'   => 'El correo :input ya esta registrado.',
            'password.required' => 'El password debe de estar presente.',
            'password.same'     => 'El password y la confirmacion de password deben de ser iguales.',
        ]);

        if ($validator->fails()) {
            return redirect('negocios/wpeoetrnddmslfhruneirun')
                ->withErrors($validator)
                ->withInput();
        }

	$user = User::create($data);
        $image = '';
        if( Input::hasFile('logo') ){
            $file = Input::file('logo');
            $image = Storage::put('public', $file );
            $image = substr($image, 7);
        }
        $data = array_merge($data,['user_id' => $user->id, 'logo' => $image]);
        Merchant::create($data);
        //Auth::guard()->login($user);
        //return redirect()->route('login');
        return view('merchants.tellamamos');
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

            if( ($monto * $qty) > $saldo ) {
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

            $monto = Input::get('consumo');

            $coupon->status = 1;
            $coupon->save();

            $user = User::find($coupon->user_id);

            // Cliente
            if( $coupon->coupon->currency == 2 ){
                $user->mc_saldo +=  $coupon->coupon->value;
	        $user->total += $coupon->coupon->value;
                $user->save();


		$merchant = User::find($coupon->coupon->user_id);
                $merchant->total += $coupon->coupon->value;
                $merchant->save();

            }else{
                $total = ($monto - $coupon->coupon->value);


                $user->total += $total;
                $user->save();

                $merchant = User::find($coupon->coupon->user_id);
                $merchant->total += $total;
                $merchant->mc_saldo += $coupon->coupon->value;
                $merchant->save();
            }

            $slot = Slot::where('user_id', $user->id)
                ->where('coupon_id', $coupon->id)
                ->first();

            $slot->update([
                'coupon_id' => 0
            ]);

            return redirect()->route('negocios.validar');
        }else{
            $id = Auth::id();
            $search = Input::get('search');
            $coupon = CouponDetail::with(['coupon' => function ($query) use ($id) {
                $query->where('user_id', $id)->first();
            }])->where('code', $search)->where('status', 0)->first();

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

            if( ($monto * $qty) > $saldo ) {
                return redirect('negocios/preconfigurar')
                    ->withErrors(['error' => 'No tiene saldo para esta cantidad de cupones'])
                    ->withInput();
            }
            $user = auth()->user();
            $user->mc_saldo -= ($monto * $qty);
            $user->save();
        }

        $cupon = Coupon::create(Input::all());
        return redirect()->route('promocion.ver',['id' => $cupon->id]);
    }

    public function verPromo($coupon_id){
        $coupon = Coupon::where('id', $coupon_id)->select(['id','url'])->first();
        return view('merchants.promocion',['enlace' => $coupon->url, 'id' => $coupon->id]);
    }

    public function verCobros(){
        $payments = Payment::where('merchant_id', auth()->id())->get();
        return view('merchants.cobrar',['payments' => $payments]);
    }

    public function marcarCobros(){
        $id = Input::get('id');
        $payment = Payment::with(['merchant'])->where('id', $id)->first();
        $merchant = $payment->merchant;
        $merchant->mc_saldo += $payment->amount;
        $merchant->save();
        $payment->status = 1;
        $payment->save();
        return response()->json(['status' => $payment]);
    }

    public function publicarSlots(){
        return view('merchants.publicar');
    }

    public function guardarSlots()
    {
        $data = Input::all();

        $validator = Validator::make($data, [
            'qty' => 'required|numeric|min:1',
            'cad' => 'required'
        ], [
            'qty.numeric' => 'La cantidad debe de ser un numero',
            'qty.required' => 'La cantidad es un valor requerido',
            'qty.min' => 'La cantidad debe de ser minimo 1 Portador',
            'cad.required' => 'La canducidad debe de ser especificada',
        ]);

        if ($validator->fails()) {
            return redirect('negocios/publicar-slots')
                ->withErrors($validator)
                ->withInput();
        }
        Dispenser::create($data);
        session([
            'messages' => [
                ['text' => 'Se ha publicado el nuevo portador con exito',
                    'type' => 'success']
            ]
        ]);

        return redirect('negocios/publicar-slots');

    }
}
