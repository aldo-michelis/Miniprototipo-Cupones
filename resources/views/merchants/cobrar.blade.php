@extends('layouts.app')

@section('title')
    <title> Cobros con Monedas | {{ config('app.name') }}</title>
@endsection

@section('content')
    <main>
        <div class="form-style-negocio">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <h3>Pagos Realizados</h3>
            <div class="espaciado">
                <table width="100%">
                    <tbody>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Monedas</th>
                        <th scope="col">Fecha</th>
                    </tr>
                    @foreach( $payments as $payment )
                            <tr @if( $payment->status )
                                class="alert-success"
                                    @endif >
                                <td><input type="checkbox" class="save-pay" value="{{ $payment->id }}"
                                   @if( $payment->status )
                                   disabled="true" checked="true"
                                    @endif >
                                    </td>
                                <td><label>{{ $payment->customer->username}}</label></td>
                                <td><label for="">{{ $payment->amount }}</label></td>
                                <td><label for="">{{ date('d/m/Y', strtotime($payment->created_at)) }}</label></td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/merchants.cobrar.js') }}"></script>
@endsection