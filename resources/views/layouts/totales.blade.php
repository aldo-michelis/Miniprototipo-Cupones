<section class="edoCuenta">
    <div>
        <img src="{{ asset('images/ico-eu1.png') }}" alt="CD" width="25"> ${{ number_format( Auth::user()->mc_saldo, 2, '.', ',') }}
    </div>
    <div>
        <img src="{{ asset('images/ico-eu2.png') }}" alt="CD" width="25"> ${{ number_format( Auth::user()->totalDePromociones(), 2, '.', ',') }}
    </div>
    <div>
        <img src="{{ asset('images/ico-eu-vacio.png') }}" alt="CD" width="25"> ${{ number_format( Auth::user()->totalDeCompraVentas(), 2, '.', ',') }}
    </div>
</section>