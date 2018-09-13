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
                                    /*phone:{
                                        text: "Enviar a mi Telefono",
                                        value: data.phone
                                    },*/
                                    accept:{
                                        text: "Aceptar",
                                        value : true
                                    }
                                },
                            }).then((phone) => {
                                if (phone) {
                                    $.ajax({
                                        url: 'enviar-mensaje/' + _id,
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
        var _phone     = $(this).data('phone');
        var _token     = $('input[name=_token]').val();
        swal({
            title: "Descripción del cupon",
            text: _info,
            icon: "info",
            buttons: {
                cancel: 'Regresar',
                /*enviar: {
                    text: 'Enviar a mi telefono',
                    value: 'enviar',
                },*/
                borrar: {
                    text: 'Eliminar',
                    value: 'delete',
                    className: 'danger'
                }
            }
        }).then((response) => {
            switch (response){
                case 'enviar':
                    if ( _phone != '' ) {
                        swal({
                            title:  'Notificación',
                            text:   'Es correcto el numero: ' + _phone,
                            icon:   'warning',
                        }).then(_phone => {
                            if(!_phone) throw null;
                            return fetch('clientes/enviar-mensaje/' + _id);
                        }).then(response => {
                            return response.json();
                        }).then(json => {
                            swal({
                                title:  'Notificación',
                                text:   'El mensaje se envio correctamente.',
                                icon:   'success'
                            });
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
                    break;

                case 'delete' :
                    swal({
                        title:  'Esta seguro que desea eliminar el codigo.',
                        text:   'esta accion es irreversible.',
                        icon:   'error',
                        buttons: {
                            accept:{
                                text: 'Si eliminar',
                                value: true

                            },
                            cancel: 'Cancelar'
                        }
                    }).then(accept => {
                        if( accept ) {

                            data = {
                                id : _id,
                                _token : _token
                            }

                            return fetch('clientes/eliminar-detalle', {
                                method: 'POST',
                                body: JSON.stringify(data),
                                headers: {
                                    'Content-Type': 'application/json'
                                }
                            }).then(response =>{
                                window.location.reload();
                            });
                        }
                    });
                    break;
            }
        });
    });

    $('.slot-vacio').click(function () {
        window.location.replace('clientes/listar-cupones');
    });

    $('.totals').click(function () {
        var _info = $(this).data('message');
        swal({
            title: "Información Impotante",
            text: _info,
            icon: "info"
        });
    });

    $('#get-slot').click(function () {
        swal({
            title: 'Adquirir un nuevo Portador',
            text: 'Con un nuevo Portador, podrás aprovechar más Bonos cuando tus Receptores actuales estén ocupados. \n' +
            'Al seleccionarlo, adquieres de inmediato tu Receptor que podrás usar y pagar cuando valides el primer Bono en cualquier Negocio Registrado. El costo es de $10 mensuales o $100 anuales.\n' +
            'También puedes buscar NRs que están regalando Receptores de Bonos',
            icon: 'info',
            buttons: {
                months: {
                    text: 'Mensual',
                    value: 'months',
                },
                years: {
                    text: 'Anual',
                    value: 'years'
                },
                listar: {
                    text: 'Buscar Cortesias',
                    value: 'listar'
                }
            }
        }).then(result => {
           switch( result ){
               case 'months':
                   return fetch('clientes/adquirir-slot/' + result);
                   break;
               case 'years':
                   return fetch('clientes/adquirir-slot/' + result);
                   break;
               case 'listar':
                   window.location.replace('clientes/adquirir');
                   break;
           }
        }).then(response => {
            response.json();

            if (response.status) {
                swal({
                    title: "Información Impotante",
                    text: "Se te ha agregado un nuevo contenedor de bonos.",
                    icon: "success"
                }).then(result => {
                    window.location.reload();
                });
            }
        });
    });

    $('.sel-slot').click(function () {
        var _id     = $(this).data('id');
        swal({
            title: 'Adquirir un nuevo Portador',
            text: 'Con un nuevo Portador, podrás aprovechar más Bonos cuando tus Receptores actuales estén ocupados. \n' +
            'Al seleccionarlo, adquieres de inmediato tu Receptor que podrás usar y pagar cuando valides el primer Bono en cualquier Negocio Registrado.',
            icon: 'info',
            buttons: ['Calcelar', 'Adjudicar']
        }).then(result => {
            if(result){
                return fetch('adquirir-slot/' + _id);
            }
        }).then(response => {
            response.json();

            if (response.status) {
                swal({
                    title: "Información Impotante",
                    text: "Se te ha agregado un nuevo contenedor de bonos.",
                    icon: "success"
                }).then(result => {
                    //window.location.reload();
                });
            }
        });
    });
});