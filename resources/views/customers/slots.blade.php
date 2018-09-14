@extends('layouts.app')

@section('title')
    <title>Buscar Portadores | {{ config('app.name') }}</title>
@endsection

@section('content')
    <main>
            <h1>Portadores Publicados</h1>
            <section class="RB">
                @foreach( $receptores as $receptor )
                    <div class="sel-slot" data-id="{{ $receptor->id }}">
                        <span>Cortesía de {{ $receptor->user->name }}</span>
                        <small class="vigencia">Hasta {{ date('d/m/Y', strtotime($receptor->cad)) }}</small>
                        <img src="{{ asset('images/RB.png') }}" height="20px" align="right" alt="Receptor de Cupon" align="right">
                        <img src="{{ asset($receptor->user->merchantImage()) }}" align="right" height="25px" alt="Receptor de Cupon">
                    </div>
                @endforeach
            </section>
    </main>
@endsection