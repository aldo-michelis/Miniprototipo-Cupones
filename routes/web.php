<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/new', function(){

    $user = App\User::create([
        'username' => '3319900075',
        'name' => 'Emmanuel Frias',
        'password' => '12345',
        'user_type' => '1'
    ]);

    $user = App\User::create([
        'username' => '3314731668',
        'name' => 'Pinshi Lupe',
        'password' => '12345',
        'user_type' => '2'
    ]);

    return "Usuarios Creados";
});

Auth::routes();

Route::get('', 'HomeController@index')->name('');
Route::get('DsbdASEJheQJEQJWEJdisidsaJQWEhas', 'HomeController@preconfigurar')->name('preconfigurar');
Route::get('promocion/{url}', 'HomeController@promocionUrl')->name('promocion');
Route::post('salvar-promocion', 'HomeController@promocionSalvar')->name('promocion.salvar');

// Rutas del Cliente
Route::prefix('clientes')->group(function (){
    Route::get('registrar', 'CustomerController@registrar')->name('clientes.registrar');
    Route::post('registrar', 'CustomerController@salvarRegistro')->name('clientes.registrar');

    Route::middleware('auth')->group(function() {
        Route::get('', 'CustomerController@index')->name('clientes.index');
        Route::get('listar-cupones/{coupon_id?}', 'CustomerController@listarCodigos')->name('clientes.listar');
        Route::get('cupon/{id}', 'CustomerController@cupon')->name('clientes.cupon');
    });
});

// Rutas del Comerciante
Route::prefix('negocios')->group(function (){
    Route::get('registrar', 'MerchantController@registrar')->name('negocios.registrar');
    Route::post('registrar', 'MerchantController@salvarRegistro')->name('negocios.registrar');
    Route::middleware('auth')->group(function() {
        Route::get('', 'MerchantController@index')->name('negocios.index');
        Route::get('agregar-codigos', 'MerchantController@agregarCodigos')->name('negocios.agregar');
        Route::post('salvar-codigos', 'MerchantController@salvarCodigos')->name('negocios.salvar');
        Route::get('validar-codigos', 'MerchantController@validarCodigos')->name('negocios.validar');
        Route::post('buscar-codigos', 'MerchantController@buscarCodigos')->name('negocios.buscar');
        Route::get('generar-url', 'MerchantController@generarUrl')->name('negocios.generar');
    });
});
