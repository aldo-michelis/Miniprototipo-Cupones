$(document).ready(function () {
    $('.coupon').click(function () {
        var _info   = $(this).data('desc');
        var _id     = $(this).data('id');
        swal({
            title: "Información del Cupon",
            text: _info,
            icon: "info",
            buttons: ['Regresar', 'Adjudicar']
        }).then((adjudicar) => {
            if (adjudicar) {
                $.ajax({
                    url: "cupon/" + _id,
                    dataType: 'JSON',
                    success: function(data){
                        if ( data.status ){
                            // Si la respuesta es afirmativa se lanza otro, indicando lo correcto, o capturando el numero.
                            swal({
                                title: "Información del Cupon",
                                text: _info,
                                icon: "info",
                                buttons: {
                                    phone:{
                                        text: "Enviar a mi Telefono",
                                        value: data.phone
                                    },
                                    accept:{
                                        text: "Aceptar",
                                        value : true
                                    }
                                },
                            }).then((phone) => {
                                if (phone) {
                                    $.ajax({
                                        url: "enviar-mensaje",
                                        method : 'POST',
                                        data: {
                                            id: 'algun id',
                                            _token: $('input[name=_token]').val()
                                        },
                                        dataType: 'JSON',
                                        success: function(data){
                                            if ( data.status ){
                                                swal('Se ha enviado correctamente', {
                                                    icon: "success",
                                                });
                                            }
                                        }
                                    });
                                }else{
                                    swal({
                                        text: "Por favor ingrese en telefono al que se va a enviar el codigo.",
                                        content: 'input',
                                        button:{
                                            text: 'Enviar',
                                            value: true
                                        }
                                    });
                                }
                            });
                        }
                    }
                });
            }
        });
    });
    // EOF .coupon click

    $('.slot').click(function () {
        var _info   = $(this).data('desc');
        var _id     = $(this).data('id');
        swal({
            title: "Información del Cupon",
            text: _info,
            icon: "info",
            buttons: ['Regresar', 'Cancelar','Enviar a Mi Telefono']
        });
    });
});