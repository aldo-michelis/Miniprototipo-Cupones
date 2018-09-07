@extends('layouts.app')

@section('title')
    <title>Clientes Pagar | {{ config('app.name') }}</title>
@endsection

@section('content')
    <main>
        <form method="post" action="{{ route('clientes.validarpago') }}" class="form-control" id="validar-pago">
            {{ csrf_field() }}
            <div class="row">
                <div class="control-group col-md-4">
                    <select name="merchant_id" id="merchant_id" class="form-control">
                        <option value="">Seleccione el negocio a pagar</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row" id="row-pagar" style="display: none;">
                <div class="col-md-8">
                    <div class="control-group">
                        <label for="monto">Monto a Pagar</label>
                        <input type="number" name="monto" id="monto">
                        <input type="submit" id="pagar" name="pagar" class="btn btn-dark" value="Pagar !">
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/customers.pagar.js') }}"></script>
@endsection

@section('modals')-
@endsection