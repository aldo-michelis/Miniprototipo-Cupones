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
                            swal(data.message, {
                                icon: "success",
                            }).then((aceptar) => {
                                window.location.reload()
                            });
                        }
                    }
                });
            }
        });
    });
});