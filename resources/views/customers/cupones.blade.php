@foreach( $slots as $slot )
    @if( isset($slot->detail) )
        <div class="slot" data-desc="Este es un {{ $slot->detail->coupon->monedaNombre() }} bueno por $ {{ $slot->detail->coupon->value }} sujeto a las siguientes condiciones: {{ $slot->detail->coupon->description }}" data-id="{{ $slot->detail->coupon->id }}" data-phone="{{ auth()->user()->username}}">
            <img src="{{ asset(Storage::url($slot->detail->coupon->user->merchantImage())) }}" height="25px" alt="RB">
            {{ $slot->detail->coupon->user->name }} | $ {{ $slot->detail->coupon->value }}
            <img src="{{ asset(Storage::url($slot->merchant->merchantImage())) }}" align="right" height="25px" alt="slot de Cupon">
            <img src="{{ asset('images/'.$slot->detail->coupon->moneda().'.png') }}" height="20px" alt="La Strada" align="right">
        </div>
    @else
        <div class="slot-vacio" data-id="{{ $slot->id }}">
            <span>Cortesía de {{ $slot->merchant->name }}</span>
            <small class="vigencia">Hasta {{ date('d/m/Y', strtotime($slot->cad)) }}</small>
            <img src="{{ asset('images/RB.png') }}" height="20px" align="right" alt="slot de Cupon" align="right">
            <img src="{{ asset(Storage::url($slot->merchant->merchantImage())) }}" align="right" height="25px" alt="slot de Cupon">
        </div>
    @endif
@endforeach