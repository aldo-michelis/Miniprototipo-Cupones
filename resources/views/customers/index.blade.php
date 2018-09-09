@extends('layouts.app')

@section('title')
    <title>Clientes Inicio | {{ config('app.name') }}</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/src/sweetalert2.css') }}">
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
        <h4>No tienes slots para reclamar cupones, adquiere uno o busca quien esta <a href="{{ route('clientes.adquirirslot') }}">regalando slots</a></h4>
    @endif
</main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.28/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/pages/customers.js') }}"></script>
@endsection

@section('modals')
@endsection