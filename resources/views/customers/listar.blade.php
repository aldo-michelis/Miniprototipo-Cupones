@extends('layouts.app')

@section('title')
    <title>Buscar Codigos | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    <section class="RB">
        <h1>Promociones destacadas</h1>
        @foreach( $cuopons as $coupon )
            @if( auth()->user()->tieneCuponActivo($coupon->id) )
            <div class="coupon" data-desc="{{ $coupon->description }}" data-id="{{ $coupon->id }}">
                <img src="{{ asset(Storage::url( $coupon->user->merchantImage() )) }}" height="25px" alt="Receptor de Cupon">
                {{ $coupon->user->name }} | ${{ $coupon->value }}
                <img src="{{ asset('images/'. $coupon->moneda().'.png') }}" height="20px" alt="Receptor de Cupon" align="right">
            </div>
            @endif
        @endforeach
    </section>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/customers.js') }}"></script>
@endsection
