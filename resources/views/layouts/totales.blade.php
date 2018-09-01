<section class="edoCuenta">
Monedas Electrónicas
<strong>${{ number_format( Auth::user()->mc_saldo, 2, '.', ',') }}</strong>
    <input type="hidden" name="mc_saldo" id="mc_saldo" value="{{ Auth::user()->mc_saldo }}">
    <br>
    @if ( Auth::user()->user_type == 1 )
        Promociones entregadas
    @else
        Descuentos acumulados
    @endif
    <strong>${{ number_format( Auth::user()->totalDePromociones(), 2, '.', ',') }}</strong>
</section>