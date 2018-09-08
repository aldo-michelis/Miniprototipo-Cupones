@extends('layouts.app')

@section('title')
    <title> Agregar Bonos | {{ config('app.name') }}</title>
@endsection

@section('content')
    <main>
        <div class="form-style-negocio">
            <form action="{{ route('negocios.guardar') }}" method="post">
                <h3 class="card-title m-t-15">Agregar Slots.</h3>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <div class="form-style-negocio-inner">
                    {{ csrf_field() }}
                    <label class="control-label">Cantidad de Slots</label><br>
                    <input type="number" id="qty" name="qty" required>
                    <br>
                    <label for="">Duración del slot</label>
                    <br>
                    <select name="cad" id="cad" required>
                        <option value="">Seleccione uno</option>
                        <option value="month">Un Mes</option>
                        <option value="year">Un Año</option>
                    </select>
                    <br>
                    <label>Descripción</label><br>
                    <textarea id="description" name="description" rows="8" clos="10"
                              required></textarea>
                    <br>
                    <button type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        //auto expand textarea
        function adjust_textarea(h) {
            h.style.height = "20px";
            h.style.height = (h.scrollHeight) + "px";
        }
    </script>
@endsection