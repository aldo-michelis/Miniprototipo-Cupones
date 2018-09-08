@extends('layouts.app')

@section('title')
    <title>Seleccionar Cupon | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    <h1>Has obtenido el siguiente cupon</h1>
    <div class="row">
        <div class="card col-md-4">
            <img src="{{ asset('images/la-strada.jpeg') }}" alt="Card image cap"
                 width="318" height="180" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $coupon->user->name }} | {{ $coupon->moneda() }} $ {{ $coupon->value }} | <strong>{{ $coupon->details[0]->code }}</strong></h5>
                <p>
                    {{ $coupon->description }}
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="{{ route('clientes.index') }}" class="btn btn-danger">Regresar</a>
    </div>
</main>
@endsection

@section('scripts')
@endsection

@section('modals')
@endsection