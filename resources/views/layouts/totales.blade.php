<section class="edoCuenta">
Monedas Electrónicas
<strong>${{ number_format( Auth::user()->mc_saldo, 2, '.', ',') }}</strong>
    <br>
    @if ( Auth::user()->user_type == 1 )
        Promociones entregadas
    @else
        Descuentos acumulados
    @endif
    <strong>${{ number_format( Auth::user()->totalDePromociones(), 2, '.', ',') }}</strong>
    <br>
    @if ( Auth::user()->user_type == 1 )
        Ventas Totales
    @else
        Compras Totales
    @endif
    <strong>${{ number_format( Auth::user()->totalDeCompraVentas(), 2, '.', ',') }}</strong>

</section>