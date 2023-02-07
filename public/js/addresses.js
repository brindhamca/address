$(document).on('click', '.addAddressForm', function(e) {
    document.location.href = "addAddressForm";
});


$(document).on('click', '#saveAddress', function(e) {
  var first_name= $("#first_name").val();
  var last_name = $("#last_name").val();
  var perform= $("#perform").val();
  var $confirm = $("#modalConfirmYesNoSearch");
   $("#customConfirm_msgSearch").replaceWith('First Name : '+first_name+"<br>"+"Last Name : "+last_name+"<br>"+"Are you sure you want to "+perform+" this item?");
   $("#customConfirm_titleSearch").replaceWith("confirmation");
   $("#customConfirm_yesSearch").replaceWith("CONFIRM");
   $("#customConfirm_noSearch").replaceWith("CANCEL");
   
   $confirm.modal('show');
   $("#btnYesConfirmYesNoSearch").off('click').click(function () {
   $confirm.modal("hide");
      $('#address_form').attr('action','/registerAddress');
      $('#address_form').submit(); 
   });
   $("#btnNoConfirmYesNoSearch").off('click').click(function () {
   $confirm.modal("hide");   
   });
   $("#closeButtonSearch").off('click').click(function () {
       $confirm.modal("hide");   
   });

});
$(document).on('click', '.delete', function(e) {
  var first_name= $(this).attr('first_name');
  var last_name = $(this).attr('last_name');
  var addressId = $(this).attr('addressId');
  var $confirm = $("#modalConfirmYesNoSearch");
   $("#customConfirm_msgSearch").replaceWith('First Name : '+first_name+"<br>"+"Last Name : "+last_name+"<br>"+"Are you sure you want to delete this item?");
   $("#customConfirm_titleSearch").replaceWith("confirmation");
   $("#customConfirm_yesSearch").replaceWith("DELETE");
   $("#customConfirm_noSearch").replaceWith("CANCEL");
   $confirm.modal('show');
   $("#btnYesConfirmYesNoSearch").off('click').click(function () {
   $confirm.modal("hide");
      
      url = "/delete/"+addressId;
        $.ajaxSetup({
        headers: { 'CsrfToken': $('meta[name="csrf-token"]').attr('content') }
      });
      $.ajax({
          type : 'GET', // Type of response and matches what we said in the route
          url: url,
          data: { addressId : addressId }, // This is the url we gave in the route
          success: function(response){ // What to do if we succeed
            $("#addressListId").html(response.html);
           if(response.success) {
             alert(response.success);
           }
          },
          error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
              console.log(JSON.stringify(jqXHR));
              console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
          }
      });
   });
   $("#btnNoConfirmYesNoSearch").off('click').click(function () {
   $confirm.modal("hide");   
   });
   $("#closeButtonSearch").off('click').click(function () {
       $confirm.modal("hide");   
   });
});

$(document).on('click', '.edit', function(e) {
    var addressId = $(this).attr('addressId');
    $("#addressId").val(addressId);
    url = "/edit/"+addressId;
    $('#addressListForm').attr('action', 'edit');
  $("#addressListForm").submit();
});