@extends('layouts.app')

@section('title')
    <title>Buscar Codigos | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    <section class="destacados">
        <h1>Promociones destacadas</h1>

        @foreach( $cuopons as $cuopon )
            <a class="carta-promocion" href="{{ route('clientes.cupon',['id' => $cuopon->id]) }}">
                <div class="card col-md-4">
                    <img src="{{ asset($cuopon->user->merchantImage()) }}" alt="Card image cap"
                         width="318" height="180" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cuopon->user->name }} | {{ $cuopon->moneda() }} $ {{ $cuopon->value }}</h5>
                        <a data-toggle="modal"
                                data-target="#descModal"
                                class="btn btn-danger desc"
                                data-desc="{{ $cuopon->description }}"
                                data-value="{{ $cuopon->value }}"
                                data-name="{{ $cuopon->user->name }}"
                                data-currency="{{ $cuopon->moneda(true) }}"
                        >Descripción</a>
                    </div>
                </div>
            </a>
        @endforeach
    </section>
</main>
@endsection

@section('scripts')
@endsection

@section('modals')
<!-- Description Modal -->
<div class="modal fade" id="descModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Descripcion del Cupon</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="modal-body">
                <p>
                    Negocio:
                    <label id="name"></label>
                </p>
                <p>
                    Tipo de Promo:
                    <label id="currency"></label></label>
                </p>
                <p>
                    Valor:
                    $<label id="value"></label>
                </p>
                <p>
                    Descripcion:
                    <label id="desc"></label>
                </p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer" id="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection