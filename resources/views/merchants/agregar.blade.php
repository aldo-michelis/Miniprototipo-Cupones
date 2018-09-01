@extends('layouts.app')

@section('content')
<main>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if( isset($preconf) )
        <form action="{{ route('promocion.salvar') }}" method="post">
            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
            <h3 class="card-title m-t-15">Promocion Preconfigurada.</h3>
            <label for="">Url del Cupon</label>
            <br>
            cupones.com/<input type="text" name="url" id="url">
            <br>
    @else
        <form action="{{ route('negocios.salvar') }}" method="post">
            <h3 class="card-title m-t-15">Agregar Cupones.</h3>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    @endif
            {{ csrf_field() }}
            <input type="hidden" name="mc_saldo" id="mc_saldo" value="{{ auth()->user()->mc_saldo }}">
            <label for="">Tipo de Moneda</label>
            <br>
            <select name="currency" id="currency" required>
                <option value="">Seleccione uno</option>
                <option value="1">Cupon</option>
                <option value="2">Moneda Circulante</option>
            </select>
            <br>
            <label class="control-label">Cantidad de Cupones</label><br>
            <input type="number" id="qty" name="qty" required>
            <br>
            <label class="control-label">Valor de Cada Cupon</label><br>
            <input type="number" id="value" name="value" required>
            <br>
            <label >Descripción</label><br>
            <textarea id="description" name="description" rows="8" clos="10" required></textarea>
            <br>
            <button type="submit">Guardar</button>
        </form>
</main>
@endsection

@section('scripts')
<script src="{{ asset('js/pages/merchants.agregar.js') }}"></script>
@endsection