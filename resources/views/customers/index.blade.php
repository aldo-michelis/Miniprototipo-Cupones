@extends('layouts.app')

@section('title')
    <title>Clientes Inicio | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    @if ( $coupon )
        <h1>Cupones Activos</h1>
            <div class="card col-md-4">
                <img src="https://www.conecto.mx/file/2016/08/home.png" alt="Card image cap"
                     width="318" height="180" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $coupon->coupon->user->name }} | {{ $coupon->moneda() }} $ {{ $coupon->coupon->value }} | <strong>{{ $coupon->code }}</strong></h5>
                    <p>
                        {{ $coupon->coupon->description }}
                    </p>
                </div>
            </div>
    @else
        <section class="destacados">
            <a href="{{ route('clientes.listar') }}" class="btn btn-danger">Buscar Promociones</a>
        </section>
    @endif
</main>
@endsection

@section('scripts')
@endsection

@section('modals')
@endsection