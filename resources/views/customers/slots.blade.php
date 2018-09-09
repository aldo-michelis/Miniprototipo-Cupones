@extends('layouts.app')

@section('title')
    <title>Buscar Slots | {{ config('app.name') }}</title>
@endsection

@section('content')
    <main>
            <h1>Slots Publicados</h1>
            <section class="RB">
                @foreach( $receptores as $receptor )
                    <div>
                        <img src="{{ asset('images/logo-strada.png') }}" height="25px" alt="Receptor de Cupon">
                        {{ $receptor->user->name }} <small>Valido hasta {{ date('d/m/Y', strtotime($receptor->cad)) }}</small>
                        <img src="{{ asset('images/RB.png') }}" height="20px" alt="Receptor de Cupon" align="right">
                    </div>
                @endforeach
            </section>
    </main>
@endsection