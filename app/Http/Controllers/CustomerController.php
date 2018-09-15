<?php

namespace App\Http\Controllers;

use App\CouponDetail;
use App\Dispenser;
use App\Mail\CodeSendingMail;
use App\Payment;
use App\Slot;
use App\User;
use App\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\IpUtils;
use Validator;
use Mail;

class CustomerController extends Controller
{
    public function index(){

        $slots = Slot::with(['user', 'merchant', 'detail' => function($query){
            $query->with(['coupon' => function($query){
                $query->with('user')->get();
            }])->where('status', 0)->get();
        }])->where('user_id', auth()->id())->get();

        return view('customers.index', ['slots' => $slots]);
    }

    public function registrar(){
        return view('customers.registrar');
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
            return redirect('clientes/registrar')
                ->withErrors($validator)
                ->withInput();
        }

        # Se crea el usuario
        $user = User::create(Input::all());

        # Se inicia sesión
        Auth::guard()->login($user);

        if( Input::has('coupon_id') ){
            $coupon = Coupon::find(Input::get('coupon_id'));

	    $detail = CouponDetail::create([
                'coupon_id' => $coupon->id,
                'code' => $this->getRandomCode(),
                'status' => 0,
                'user_id' => $user->id
            ]);


            # Se asigna un slot con el usuario 1
            $slot = Slot::create([
                'user_id' => $user->id,
                'merchant_id' => $coupon->user_id,
                'coupon_id' => $detail->id,
                'cad' => date('Y-m-d', strtotime(now()->addYear(1))),
                'status' => 0
            ]);

            $this->enviarPorMensaje($coupon->id);

            return redirect('clientes');
        }

        # Se asigna un slot con el usuario 1
        $slot = Slot::create([
            'user_id' => $user->id,
            'merchant_id' => 1,
            'coupon_id' => 0,
            'cad' => date('Y-m-d', strtotime(now()->addYear(1))),
            'status' => 0
        ]);

        session([
            'messages' => [
                ['text' => 'Felicidades has recibido un Portador de cupones de cortesia, que es valido por un año.',
                'type' => 'success']
            ]
        ]);

        return redirect()->route('login');
    }

    public function listarCodigos( $coupon_id = null )
    {
        if (Auth::user()->tieneSlotsLibres()) {
            if (!isset($coupon_id))
                $cuopons = Coupon::with('user')
                    ->where('qty', '>', '0')
                    ->where('url', '#')
                    ->get();
            else
                $cuopons = Coupon::with('user')
                    ->where('id', $coupon_id)
                    ->where('qty', '>', '0')->get();

            return view('customers.listar', ['cuopons' => $cuopons]);
        }
        return redirect('clientes')->withErrors([
            'error' => 'Ya no tienes portadores libres, por favor, canjea tus cupones o adquiere más portadores'
        ]);
    }

    public function cupon($id){
        if( !Auth::user()->tieneSlotsLibres() ){
            return response()->json(['status' => false, 'message' => 'Ya no tienes portadores libres, por favor, canjea tus cupones o adquiere más portadores']);
        }else {
            $user_id = auth()->id();
            $coupon = Coupon::where('id', $id)->first();

            if ($coupon->qty <= 0)
                return response()->json(['status' => false, 'message' => 'Este cupon ya no tiene codigos disponibles']);

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
            $code = $detail->code;

            $coupon = Coupon::with(['details' => function ($query) use ($user_id, $code) {
                $query->where('code', $code)->get();
            }, 'user'])->where('id', $id)->first();

            // TODO Codigo para enviar por correo o sms

            return response()->json([
                'status'    => true,
                'message'   => 'El codigo de redención ha sido enviado a tu correo registrado',
                'phone'     => auth()->user()->phone
            ]);
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
            'amount' => $monto,
            'status' => 0
        ]);

        return redirect()->back();
    }

    public function adquirirSlot(){
        $available = Dispenser::with('user')->get();
        $now = now();
        return view('customers.slots', ['receptores' => $available, 'now' => $now]);
    }

    public function salvarSlot($id){
        if( is_numeric($id) ) {
            $disp = Dispenser::find($id);

            $disp->update([
                'qty' => $disp->qty - 1
            ]);

            Slot::create([
                'user_id' => auth()->id(),
                'merchant_id' => $disp->user->id,
                'coupon_id' => 0,
                'cad' => date('Y-m-d', strtotime('+1 ' . $disp->cad)),
                'status' => 0
            ]);
            return response()->json(['status' => true]);
        }else{
            Slot::create([
                'user_id' => auth()->id(),
                'merchant_id' => 1,
                'coupon_id' => 0,
                'cad' => date('Y-m-d', strtotime('+1 ' . $id)),
                'status' => 0
            ]);
            return response()->json(['status' => true]);
        }
    }

    public function enviarPorMensaje($id)
    {
        $detail = CouponDetail::where('coupon_id', $id)
                                ->where('user_id', auth()->id())
                                ->where('status', 0)->first();	

	Mail::to(auth()->user()->username)->send(new CodeSendingMail($detail));
        return response()->json(['status' => true]);
    }

    public function eliminarCuponDetalle(){
        $id = Input::get('id');

        $slot = Slot::where('coupon_id', $id)->update([
            'coupon_id' => 0
        ]);
        $detail = CouponDetail::where('id', $id)->first();

        $coupon = Coupon::where('id', $detail->coupon_id)->first();

        $coupon->update([
            'qty' => $coupon->qty += 1
        ]);
        $detail->delete();

        return response()->json(['status' => true ]);
    }
}
