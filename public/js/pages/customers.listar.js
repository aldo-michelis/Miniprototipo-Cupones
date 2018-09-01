$(document).ready(function () {
   $("#descModal").on('show.bs.modal', function (e) {
       var button = $(e.relatedTarget);
       var modal = $(this);

       var desc = button.data('desc');
       var value = button.data('value');
       var name = button.data('name');
       var currency = button.data('currency');


       modal.find('#desc').text(desc);
       modal.find('#value').text(value);
       modal.find('#name').text(name);
       modal.find('#currency').text(currency);
   });
});