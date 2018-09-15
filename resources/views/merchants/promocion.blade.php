@extends('layouts.app')

@section('title')
    <title> Promociones | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    <h3>Enlace de Promoción</h3>
    <strong>
        <a href="https://eucari.com/promocion/{{ $enlace }}" target="_blank">
            https://eucari.com/promocion/{{ $enlace }}
        </a>
    </strong>
    <br>
    <a href="https://eucari.como/code/{{ $id }}">Descargar Codigo QR</a>
    <br>
    {!! QrCode::size(200)->margin(3)->generate('https://eucari.com/promocion/'.$enlace) !!}
</main>
@endsection