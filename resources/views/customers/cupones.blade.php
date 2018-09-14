@foreach( $slots as $slot )
    @if( isset($slot->detail) )
        <div class="slot" data-desc="{{ $slot->detail->coupon->description }}" data-id="{{ $slot->detail->id }}" data-phone="{{ auth()->user()->username}}">
            <img src="{{ asset('images/default.jpeg') }}" height="25px" alt="RB">
            {{ $slot->detail->coupon->user->name }} | $ {{ $slot->detail->coupon->value }}
            <img src="logo de quien regala" height="20px" alt="Quien regala" align="right">
            <img src="{{ asset('images/'.$slot->detail->coupon->moneda().'.png') }}" height="20px" alt="La Strada" align="right">
        </div>
    @else
        <div class="slot-vacio" data-id="{{ $slot->id }}">
            <span>Cortesía de {{ $slot->user->name }}</span>
            <small class="vigencia">Hasta {{ date('d/m/Y', strtotime($slot->cad)) }}</small>
            <img src="{{ asset('images/RB.png') }}" height="20px" align="right" alt="slot de Cupon" align="right">
            <img src="{{ asset($slot->merchant->merchantImage()) }}" align="right" height="25px" alt="slot de Cupon">
        </div>
    @endif
@endforeach