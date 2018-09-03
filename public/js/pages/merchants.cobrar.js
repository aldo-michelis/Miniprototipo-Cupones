$(document).ready(function () {
    $('.save-pay').change(function () {
        if( $(this).is(':checked') ){
            var res = confirm('¿Esta seguro que desea verificar este pago?')
            if( res ){
                $.ajax({
                    url : 'cobrar-marcar',
                    data : {
                        id : $(this).val(),
                        _token : $('#_token').val()
                    },
                    type : 'POST',
                    dataType : 'json',
                    success : function(json) {
                        location.reload();
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                        console.log(xhr)
                    }
                });
            }
        }
    });
});