<label for="">Promos Entregadas: </label>
<br>
<label for="">$ {{ number_format(Auth::user()->totalDePromociones() ) }} </label>
<br>
<label for="">Saldo en MC: </label>
<br>
<label for="">$ {{$total}} </label>
<br>