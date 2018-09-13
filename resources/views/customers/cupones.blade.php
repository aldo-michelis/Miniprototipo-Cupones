@foreach( $slots as $slot )
    @if( isset($slot->detail) )
        <div class="slot" data-desc="{{ $slot->detail->coupon->description }}" data-id="{{ $slot->detail->id }}" data-phone="{{ auth()->user()->username}}">
            <img src="{{ asset('images/default.jpeg') }}" height="25px" alt="RB">
            {{ $slot->detail->coupon->user->name }} | $ {{ $slot->detail->coupon->value }}
            <img src="logo de quien regala" height="20px" alt="Quien regala" align="right">
            <img src="{{ asset('images/'.$slot->detail->coupon->moneda().'.png') }}" height="20px" alt="La Strada" align="right">
        </div>
    @else
        <div class="slot-vacio">
            <img src="images/eucari-ico.png" height="25px" alt="RB">
            RB Cortesía de La Strada
            <img src="images/logo-strada.png" height="20px" alt="La Strada" align="right">
        </div>
    @endif
@endforeach