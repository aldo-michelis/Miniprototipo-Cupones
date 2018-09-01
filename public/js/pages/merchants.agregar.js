$(document).ready(function () {
    $('#value').keypress(function () {
        var saldo = $('#mc_saldo').val();
        var monedas = $(this).val();

        if( $('#currency').val() == 2 )
            saldo + " " + monedas

    });
});