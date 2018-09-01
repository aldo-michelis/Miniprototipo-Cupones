$(document).ready(function () {
   $('#merchant_id').change(function () {
       if( $(this).val() != '' )
           $('#row-pagar').css('display', 'block');
       else
           $('#row-pagar').css('display', 'none');
   });

   $('#pagar').click(function (e) {
       var monto = $('#monto').val();
       if( monto == '' ) {
           alert('Por favor ingrese un ponto a pagar');
           return false
       }
       return true;
   });
});