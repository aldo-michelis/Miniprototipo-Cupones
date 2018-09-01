@if ( Auth::user()->user_type == 1 )
    <label for="">Promos Entregadas: </label>
    <br>
    <label for="">$ {{ Auth::user()->totalDePromociones() }} </label>
    <br>
    <label for="">Saldo en MC: </label>
    <br>
    <label for="">$ {{ Auth::user()->mc_saldo }} </label>
    <br>
@else
    <section class="edoCuenta">
        Monedas Electrónicas
            <strong>${{ number_format( Auth::user()->mc_saldo, 2, '.', ',') }}</strong>
        <br>
        Descuentos acumulados
            <strong>${{ number_format( Auth::user()->totalDePromociones(), 2, '.', ',') }}</strong>
    </section>
@endif