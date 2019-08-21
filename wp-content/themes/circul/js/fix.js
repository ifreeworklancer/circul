$('body').on('click', '.item__increment', function () {

  var inputAmount = $(this).siblings('.item__value');

  var inputAmountVal = $(this).siblings('.item__value').text();

  var originalQtyInp = $(this).parent().siblings('.original-qty').find('input[type=number]');

  inputAmountVal++;

  $(inputAmount).text(inputAmountVal);

  $(originalQtyInp).val(inputAmountVal);

  // $(originalQtyInp).trigger( "change" );

  $('button[name="update_cart"]').removeAttr("disabled");

});


$('body').on('click', '.item__decrement', function () {

  var inputAmount = $(this).siblings('.item__value');

  var inputAmountVal = $(this).siblings('.item__value').text();

  var originalQtyInp = $(this).parent().siblings('.original-qty').find('input[type=number]');

  inputAmountVal--;

  if (inputAmountVal == 0) {
    inputAmountVal = 1;
  }

  $(inputAmount).text(inputAmountVal);

  $(originalQtyInp).val(inputAmountVal);

  // $(originalQtyInp).trigger( "change" );

  $('button[name="update_cart"]').removeAttr("disabled");

});

$('body').on('click', '.close-notice', function () {
  $('.woocommerce-notice').hide();
});

// Billing
const $billing_country = $('#billing_country').val();

if ($billing_country) {
  toggleBilling($billing_country);

  $('#billing_country').on('change', toggleBilling($billing_country));
}

function toggleBilling() {
  if ($billing_country === 'UA') {
    $('#nova_poshta_shipping_fields').show();
    $('#billing_address_1, #billing_city').hide();
  } else {
    $('#nova_poshta_shipping_fields').hide();
    $('#billing_address_1, #billing_city').show();
  }
}