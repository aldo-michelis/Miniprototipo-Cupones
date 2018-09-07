@extends('layouts.app')

@section('title')
    <title>Clientes Inicio | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    <h1>Cupones Activos</h1>
    @if ( auth()->user()->tieneSlotsLibres() )
    <section class="destacados">
        <a href="{{ route('clientes.listar') }}" class="btn btn-danger">Buscar Promociones</a>
    </section>
    @endif
    <section class="destacados">
        @if ( isset($slots) )
            @include('customers.cupones')
        @endif
    </section>

    @if( !auth()->user()->tieneSlots() )
        <h4>No tienes slots para reclamar cupones, adquiere uno o busca quien esta regalando slots</h4>
    @endif
</main>
@endsection

@section('scripts')
@endsection

@section('modals')
@endsection