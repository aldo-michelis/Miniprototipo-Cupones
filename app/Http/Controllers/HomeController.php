<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if( Auth::user()->user_type == 1 )
                return redirect()->route('negocios.index');
            else
                return redirect()->route('clientes.index');
        }else{
            return view('index');
        }
    }

    public function promocionUrl($url){
        $coupon = Coupon::where('url', $url)->first();
        return view('customers.registrar',['coupon' => $coupon]);
    }
}
