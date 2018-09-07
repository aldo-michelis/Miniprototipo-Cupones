<?php

namespace App\Http\Controllers;

use App\CouponDetail;
use App\Payment;
use App\Slot;
use App\User;
use App\Coupon;
use function foo\func;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    public function index(){

        $slots = Slot::with(['user', 'merchant', 'detail' => function($query){
            $query->with(['coupon' => function($query){
                $query->with('user')->first();
            }])->first();
        }])->where('user_id', auth()->id())->get();
        return view('customers.index', ['slots' => $slots]);
    }

    public function registrar(){
        return view('customers.registrar');
    }

    public function salvarRegistro(){
        // TODO, agregar validaciones para contraseñas iguales y username repetidos
        # Se crea el usuario
        $user = User::create(Input::all());

        # Se asigna un slot con el usuario 1
        $slot = Slot::create([
                    'user_id' => $user->id,
                    'merchant_id' => 1,
                    'coupon_id' => 0,
                    'cad' => date('Y-m-d', strtotime(now()->addYear(1))),
                    'status' => 0
                ]);

        # Se inicia sesión
        Auth::guard()->login($user);
        if( Input::has('coupon_id') ){
            return redirect('clientes/listar-cupones/' . Input::get('coupon_id'));
        }

        session([
            'messages' => [
                ['text' => 'Felicidades has recibido un Slot de cupones de cortesia, que es valido por un año.',
                'type' => 'success']
            ]
        ]);

        return redirect()->route('login');
    }

    public function listarCodigos( $coupon_id = null )
    {
        if( Auth::user()->tieneSlotsLibres() ) {
            if (!isset($coupon_id))
                $cuopons = Coupon::with('user')->where('qty', '>', '0')->get();
            else
                $cuopons = Coupon::with('user')
                    ->where('id', $coupon_id)
                    ->where('qty', '>', '0')->get();

            return view('customers.listar', ['cuopons' => $cuopons]);
        }

        return redirect()->back()->withErrors(['error' => 'Ya no tienes slots libres, por favor, canjea tus cupones o adquiere más slots']);
    }

    public function cupon($id){
        if( !Auth::user()->tieneSlotsLibres() ){
            return redirect()->route('clientes.listar')->withErrors(['error' => 'Ya no tienes slots libres, por favor, canjea tus cupones o adquiere más slots']);
        }else{
            $coupon = Coupon::with(['details' => function($query){
                $query->where('status', 0)->first();
            }, 'user'])->where('id', $id)->first();

            if( $coupon->qty <= 0 )
                return redirect()->route('clientes.listar')->withErrors(['error' => 'Ya cuentas con un cupon']);

            $detail = CouponDetail::create([
                            'coupon_id' => $id,
                            'code' => $this->getRandomCode(),
                            'status' => 0,
                            'user_id' => Auth::id()
                        ]);

            $slot = Slot::where('user_id', auth()->id())
                        ->where('coupon_id', 0)
                        ->where('status', 0)
                        ->first();

            $slot->update([
                'coupon_id' => $detail->id
            ]);

            $coupon->update([
                'qty' => ($coupon->qty - 1)
            ]);

            return view('customers.cupon', ['coupon' => $coupon]);
        }
    }

    public function pagar(){
        $users = User::where('user_type', 1)->get();
        return view('customers.pagar',['users' => $users]);
    }

    public function validarPago(){
        $monto = Input::get('monto');
        $merchant_id = Input::get('merchant_id');
        $user = auth()->user();

        if( $user->mc_saldo <= 0 || $monto > $user->mc_saldo )
            return redirect()->back()->withErrors(['error' => 'No tienes saldo suficiente']);

        $user->mc_saldo -= $monto;
        $user->save();

        $pago = Payment::create([
            'customer_id' => auth()->id(),
            'merchant_id' => $merchant_id,
            'amount' => $monto
        ]);

        return redirect()->back();
    }

    public function adquirirSlot(){

    }
}
