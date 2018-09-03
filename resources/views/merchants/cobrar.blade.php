@extends('layouts.app')

@section('title')
    <title> Agregar Bonos | {{ config('app.name') }}</title>
@endsection

@section('content')
    <main>
        <h3>Pagos Realizados</h3>
        @foreach( $payments as $payment )
            <div>
                <input type="checkbox"> <label for="">Fulano</label> | <label for="">{{$payment->amount }}</label> | <label
                        for="">{{ date('d/m/Y', strtotime($payment->created_at)) }}</label>
            </div>
        @endforeach
    </main>
@endsection

@section('scripts')

@endsection