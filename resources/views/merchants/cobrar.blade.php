@extends('layouts.app')

@section('title')
    <title> Cobros con Monedas | {{ config('app.name') }}</title>
@endsection

@section('content')
    <main>
        <h3>Pagos Realizados</h3>
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        @foreach( $payments as $payment )
            <div
                @if( $payment->status )
                    class="alert-success"
                @endif
            >
                <input type="checkbox" class="save-pay" value="{{ $payment->id }}">
                    <label class="">{{ $payment->customer->name}}</label> |
                    <label for="">{{$payment->amount }}</label> |
                <label>{{ date('d/m/Y', strtotime($payment->created_at)) }}</label>
            </div>
        @endforeach
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/merchants.cobrar.js') }}"></script>
@endsection