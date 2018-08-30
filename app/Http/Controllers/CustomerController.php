<?php

namespace App\Http\Controllers;

use App\CouponDetail;
use App\User;
use App\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    public function index(){
        return view('customers.index');
    }

    public function registrar(){
        return view('customers.registrar');
    }

    public function salvarRegistro(){
        $user = User::create(Input::all());
        if( Input::has('coupon_id') ){
            Auth::guard()->login($user);
            return redirect('clientes/listar-cupones/' . Input::get('coupon_id'));
        }
        return redirect()->route('login');
    }

    public function listarCodigos( $coupon_id = null )
    {
        if( Auth::user()->tieneCuponesActivos() ) {
            if (!isset($coupon_id))
                $cuopons = Coupon::with('user')->where('qty', '>', '0')->get();
            else
                $cuopons = Coupon::with('user')
                    ->where('id', $coupon_id)
                    ->where('qty', '>', '0')->get();

            return view('customers.listar', ['cuopons' => $cuopons]);
        }

        return "
            Ya tienes cupones activos, canjea los que tienes y regresa por mas
            <a href=". route('clientes.index') .">Volver</a>
            ";
    }

    public function cupon($id){
        if( Auth::user()->tieneCuponesActivos() ){
            return redirect()->route('clientes.listar');
        }else{
            $otherCheck = Coupon::find($id);

            if( $otherCheck->qty <= 0 )
                return redirect()->route('clientes.listar');
            CouponDetail::create([
                'coupon_id' => $id,
                'code' => $this->getRandomCode(),
                'status' => 0,
                'user_id' => Auth::id()
            ]);
            $coupon = Coupon::with(['user','details'])->where('id', $id)->first();
            $coupon->update([
                'qty' => ($coupon->qty - 1)
            ]);
            return view('customers.cupon', ['coupon' => $coupon]);
        }
    }
}
