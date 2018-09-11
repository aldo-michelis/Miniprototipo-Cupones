@extends('layouts.app')

@section('title')
    <title> Validar Bonos | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    @if( isset($none) && $none == true )
        <div class="form-style-negocio">
            <h1>Validar bono</h1>
            <div class="form-style-negocio-inner">
                <p> El código no es válido, vuelve a intentar</p>
                <a href="{{ route('negocios.validar') }}" class="btn-gina">Regresar</a>
            </div>
        </div>
    @endif

    @if( !isset($cupon) && !isset($none) )
        <div class="form-style-negocio">
            <h1>Validar Bono</h1>
            <div class="form-style-negocio-inner">
                <form action="{{ route('negocios.buscar') }}" method="post">
                    {{ csrf_field() }}
                    <label for="">Ingrese Código: </label>
                    <input type="text" name="search" id="search">
                    <input type="submit" value="Buscar Código">
                </form>
            </div>
        </div>
    @endif

    @if( isset($cupon) )
        <form action="{{ route('negocios.buscar') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="card col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cupon->user()->name }} | {{ $cupon->moneda() }} $ {{ $cupon->coupon->value }} | <strong>{{ $cupon->code }}</strong></h5>
                        <p>
                            {{ $cupon->coupon->description }}
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <input type="hidden" name="cupon_id" id="cupon_id" value="{{ $cupon->id }}">
                <div class="control-group">
                    <label for="" class="conr">Ingrese Consumo Total</label>
                    <input type="number" name="consumo" id="consumo"> <br>
                </div>
                <div>
                    <input type="submit" value="Validar Código">
                </div>
            </div>
        </form>
    @endif
</main>
@endsection