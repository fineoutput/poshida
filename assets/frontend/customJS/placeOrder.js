$('#placeOrderForm').on('submit', function (e) {
  e.preventDefault();
  var referalcode = $("#referalcode").val()
  var payment_method = $(".payment_method:checked").val()
  var formData = {
    referalcode: referalcode,
    payment_method: payment_method
  };
  $("#loader").css("display", 'block');
  $("#place").css("display", 'none');
  // return;
  $.ajax({
    type: "POST",
    url: base_url + 'Order/checkout',
    data: formData,
    dataType: "json",
    success: function (response) {
      if (payment_method == 1) {
        // ------ COD Order Placed -----------------------
        if (response.status == true) {
          window.location.replace(base_url + "order_success");
        } else if (response.status == false) {
          notifyError(response.message)
          $("#loader").css("display", 'none');
          $("#place").css("display", 'block');
          if (response.message == "Please add address before checkout") {
            window.location.replace(base_url + "Order/add_address");
          }
        }
      } else {
        // ------ open ccavenue -----------------
        if (response.status == true) {
          window.location.replace(base_url + "Order/open_cc_avenue");

        } else {
          notifyError(response.message)
          $("#loader").css("display", 'none');
          $("#place").css("display", 'block');
          if (response.message == "Please add address before checkout") {
            window.location.replace(base_url + "Order/add_address");
          }
        }
      }
    }
  });
});
//==================== call calculate  ================
function call_calculate() {
  // var pincode = $('#pincode').val();
  // var courier_id = $('#courier_id').val();
  // if (pincode != "") {
  // window.location.replace(base_url + "Order/calculate/" + pincode + "/" + courier_id);
  window.location.replace(base_url + "Order/calculate");
  // } else {
  //   notifyError('Please Enter Pincode Before Checkout!')
  // }
}
//===========================================  ==============================================
$('select').on('change', function () {
  var price = $(this).find(':selected').attr('data-id');
  if (price) {
    var shipping = $('#spn').val();
    var amount = price - shipping;
    $('#return_msg').html('Amount to be Return (Excluding Shipping): ₹' + amount)
  } else {
    $('#return_msg').html('')
  }
  return;


});
