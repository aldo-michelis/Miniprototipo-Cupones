@foreach( $slots as $slot )
    @if( isset($slot->detail) )
        <div>
            <img src="{{ asset('images/default.jpeg') }}" height="25px" alt="RB">
            {{ $slot->detail->coupon->user->name }}
            <img src="{{ asset('images/'.$slot->detail->coupon->moneda().'.png') }}" height="20px" alt="La Strada" align="right">
        </div>
    @else
        <div class="">
            <img src="images/eucari-ico.png" height="25px" alt="RB">
            RB Cortesía de La Strada
            <img src="images/logo-strada.png" height="20px" alt="La Strada" align="right">
        </div>
    @endif
@endforeach