<section class="edoCuenta">
    <div class="totals" data-message="Estos son tus 'Cari' (de la raíz griega 'gracias') Son una forma en la que los Establecimientos agradecen tu preferencia. Para obtener Caris, selecciona algún Portador libre (o adquiere uno nuevo) y selecciona los Caris disponibles identificados con el ícono [icono_cari.jpg]. Con tus Caris, puedes adquirir productos y servicios de cualquier Establecimiento afiliado!">
        <img src="{{ asset('images/MC.png') }}" alt="MC" width="25"> ${{ number_format( Auth::user()->mc_saldo, 2, '.', ',') }}
    </div>
    <div class="totals" data-message="Estos son tus 'Eu' (de la raíz griega 'bueno'). Cada uno es un beneficio especial que los Establecimientos ofrecen, 'bueno por' el valor establecido en productos y servicios de dicho Establecimiento. Para obtener Eus, selecciona algún Portador libre (o adquiere uno nuevo) y selecciona los Eus disponibles identificados con el ícono [icono_eu.jpg].">
        <img src="{{ asset('images/CD.png') }}" alt="CD" width="25"> ${{ number_format( Auth::user()->totalDePromociones(), 2, '.', ',') }}
    </div>
    <div class="totals" data-message="Estas son tus Compras Totales (las que efectivamente has pagado con dinero). Los Establecimientos suelen emitir Eus y Caris exclusivos para clientes con mayores Compras Totales">
        <img src="{{ asset('images/ico-eu-vacio.png') }}" alt="CD" width="25"> ${{ number_format( Auth::user()->total, 2, '.', ',') }}
    </div>
</section>