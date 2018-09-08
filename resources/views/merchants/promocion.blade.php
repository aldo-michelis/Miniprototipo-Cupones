@extends('layouts.app')

@section('title')
    <title> Promociones | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    <h3>Enlace de Promoción</h3>
    <strong>
        <a href="http://cupones.com/promocion/{{ $enlace }}" target="_blank">
            http://cupones.com/promocion/{{ $enlace }}
        </a>
    </strong>
    <br>
    {!! QrCode::size(200)->margin(3)->generate('http://cupones.com/promocion/'.$enlace) !!}
</main>
@endsection