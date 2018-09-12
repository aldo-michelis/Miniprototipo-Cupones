@extends('layouts.app')

@section('title')
    <title> Promociones | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    <h3>Enlace de Promoción</h3>
    <strong>
        <a href="http://cupones.com/promocion/{{ $enlace }}" target="_blank">
            http://18.223.232.129/public/promocion/{{ $enlace }}
        </a>
    </strong>
    <br>
    {!! QrCode::size(200)->margin(3)->generate('http://18.223.232.129/public/promocion/'.$enlace) !!}
</main>
@endsection