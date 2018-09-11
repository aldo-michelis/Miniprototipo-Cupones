
@if( Auth::guest() )
    <!-- login -->
    <div class="registro-inic">
        <section class="acceder">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div>
                    <input type="text" id="username" name="username" placeholder="usuario">
                    <input type="password" id="password" name="password" placeholder="contraseña">
                    <br>
                    <label>
                        <input type="checkbox"> Mantenerme Conectado
                    </label>
                    &nbsp;
                    <a href="clientes.html"><button type="submit">Ingresar</button></a>

                </div>
            </form>
        </section>
    </div>
@endif

<p>
    En construcción

    Muy pronto todo lo bueno que los establecimientos que frecuentas tienen para agradecer tu preferencia, estará disponible en este espacio
</p>
        <p>&nbsp;</p>
        <img src="images/eucari-logo.png" alt="eucary" width="200" class="img-fluid">
        <p>&nbsp;</p>

<p>
    Si quieres participar como establecimiento, regístrate
    <a href="{{ route('negocios.registrar') }}">Aquí</a>
</p>