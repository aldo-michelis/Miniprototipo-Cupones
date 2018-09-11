@extends('layouts.app')

@section('title')
    <title>Clientes Inicio | {{ config('app.name') }}</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/src/sweetalert2.css') }}">
@endsection

@section('content')
<main>
    @if ( auth()->user()->tieneSlotsLibres() )
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