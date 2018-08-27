<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
