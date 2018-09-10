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
        'name' => 'Administrador General',
        'password' => '12345',
        'mc_saldo' => 1000,
        'user_type' => '1'
    ]);

    $user = App\User::create([
        'username' => '3314731668',
        'name' => 'Cliente de Ejemplo',
        'password' => '12345',
        'mc_saldo' => 0,
        'user_type' => '2'
    ]);

    return "Usuarios Creados";
});

Route::get('code', function ()
{
    return QrCode::size(200)->margin(10)->generate('https://m.facebook.com');
});

Auth::routes();

Route::get('', 'HomeController@index')->name('');
Route::get('promocion/{url}', 'HomeController@promocionUrl')->name('promocion');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Rutas del Cliente
Route::prefix('clientes')->group(function (){
    Route::get('registrar', 'CustomerController@registrar')->name('clientes.registrar');
    Route::post('registrar', 'CustomerController@salvarRegistro')->name('clientes.registrar');

    Route::middleware('auth')->group(function() {
        Route::get('', 'CustomerController@index')->name('clientes.index');
        Route::get('listar-cupones/{coupon_id?}', 'CustomerController@listarCodigos')->name('clientes.listar');
        Route::get('cupon/{id}', 'CustomerController@cupon')->name('clientes.cupon');
        Route::get('pagar', 'CustomerController@pagar')->name('clientes.pagar');
        Route::post('pagar', 'CustomerController@validarPago')->name('clientes.validarpago');
        Route::get('adquirir', 'CustomerController@adquirirSlot')->name('clientes.adquirirslot');
        Route::get('adquirir-slot/{id}', 'CustomerController@salvarSlot')->name('clientes.salvar');
        Route::get('adquirir-slot/{id}', 'CustomerController@salvarSlot')->name('clientes.salvar');
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
        Route::get('preconfigurar', 'MerchantController@preconfigurar')->name('preconfigurar');
        Route::get('ver-promocion/{coupon_id}', 'MerchantController@verPromo')->name('promocion.ver');
        Route::post('salvar-promocion', 'MerchantController@promocionSalvar')->name('promocion.salvar');
        Route::get('cobrar', 'MerchantController@verCobros')->name('negocios.cobrar');
        Route::post('cobrar-marcar', 'MerchantController@marcarCobros')->name('negocios.marcar');
        Route::get('publicar-slots', 'MerchantController@publicarSlots')->name('negocios.publicar');
        Route::post('publicar-slots', 'MerchantController@guardarSlots')->name('negocios.guardar');
    });
});
