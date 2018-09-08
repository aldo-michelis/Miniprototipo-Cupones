@extends('layouts.app')

@section('title')
    <title>Buscar Codigos | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    <section class="destacados">
        <h1>Promociones destacadas</h1>

        @foreach( $cuopons as $cuopon )
            <div class="card-group">
                <div class="card col-md-4">
                    <a href="#"><img src="{{ asset('images/default.jpeg') }}" class="card-img-top" alt="imagen papeleria"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title">
                                {{ $cuopon->user->name }} |
                                {{ $cuopon->moneda() }}
                                ${{ $cuopon->value }}
                            </h5>
                        </a>
                        <p class="card-text">{{ $cuopon->description }}</p>
                        <p class="card-text" align="right">
                            <a href="{{ route('clientes.cupon',['id' => $cuopon->id]) }}">
                                Ve detalles y aplica tu cupón &rsaquo;
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</main>
@endsection

@section('scripts')
@endsection
