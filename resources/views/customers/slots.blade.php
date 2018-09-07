@foreach( $slots as $slot )
    @if( isset($slot->detail) )
        <div class="card col-md-4">
            <img src="https://www.conecto.mx/file/2016/08/home.png" alt="Card image cap"
                 width="318" height="180" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $slot->detail->coupon->user->name }} |
                    {{ $slot->detail->coupon->moneda() }}
                    $ {{ $slot->detail->coupon->value }} |
                    <strong>{{ $slot->detail->code }}</strong></h5>
                <p>
                    {{ $slot->detail->coupon->description }}
                </p>
            </div>
            <small>Slot patrocinado por: <strong>{{ $slot->merchant->name }}</strong>  vigencia hasta el <strong>{{ date('d/m/Y', strtotime($slot->cad)) }}</strong></small>
        </div>
    @else
        <div class="card col-md-4">
            <img src="{{ asset('images/default.jpeg') }}" alt="Card image cap"
                 width="318" height="180" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Slot Disponible</h5>
                <p>
                    Consulta las promociones <br>
                    para seguir disfrutando de los beneficios.
                </p>
            </div>
            <small>Slot patrocinado por: <strong>{{ $slot->merchant->name }}</strong>  vigencia hasta el <strong>{{ date('d/m/Y', strtotime($slot->cad)) }}</strong></small>
        </div>
    @endif
@endforeach

