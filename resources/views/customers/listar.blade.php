@extends('layouts.app')

@section('title')
    <title>Buscar Codigos | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    <section class="RB">
        <h1>Promociones destacadas</h1>
        @foreach( $cuopons as $cuopon )
            <div class="coupon" data-desc="{{ $cuopon->description }}" data-id="{{ $cuopon->id }}">
                <img src="{{ asset('images/logo-strada.png') }}" height="25px" alt="Receptor de Cupon">
                {{ $cuopon->user->name }}
                <img src="{{ asset('images/'. $cuopon->moneda().'.png') }}" height="20px" alt="Receptor de Cupon" align="right">
            </div>
        @endforeach
    </section>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/customers.js') }}"></script>
@endsection
