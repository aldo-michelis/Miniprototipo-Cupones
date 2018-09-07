@extends('layouts.app')

@section('title')
    <title>Buscar Codigos | {{ config('app.name') }}</title>
@endsection

@section('content')
<main>
    <section class="destacados">
        <h1>Promociones destacadas</h1>

        @foreach( $cuopons as $cuopon )
            <div class="card-group">
                <div class="card col-md-4">
                    <a href="#"><img src="{{ asset('images/default.jpeg') }}" class="card-img-top" alt="imagen papeleria"></a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title">
                                {{ $cuopon->user->name }} |
                                {{ $cuopon->moneda() }}
                                ${{ $cuopon->value }}
                            </h5>
                        </a>
                        <p class="card-text">{{ $cuopon->description }}</p>
                        <p class="card-text" align="right">
                            <a href={{ route('clientes.cupon',['id' => $cuopon->id]) }}"">
                                Ve detalles y aplica tu cupón &rsaquo;
                            </a>
                        </p>
                    </div>
                </div>
            </div>
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