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
window.onload = toggleBilling;
$('#billing_country').on('change', toggleBilling);

function toggleBilling() {
    const $country = $('#billing_country').val();

    if ($country === 'UA') {
        $('#nova_poshta_shipping_fields').show();
        $('#billing_address_1, #billing_city, #billing_postcode').hide();
    } else {
        $('#nova_poshta_shipping_fields').hide();
        $('#billing_address_1, #billing_city, #billing_postcode').show();
    }

    checkBillingInfo();
}

function checkBillingInfo() {
    let f1, f2, f3;
    const $country = $('#billing_country').val();

    if ($country === 'UA') {
        f1 = $('#nova_poshta_shipping_area').val();
        f2 = $('#nova_poshta_shipping_city').val();
        f3 = $('#nova_poshta_shipping_warehouse').val();
    } else {
        f1 = $('#billing_address_1').val();
        f2 = $('#billing_city').val();
        f3 = $('#billing_postcode').val();
    }

    if (f1 && f2 && f3) {
        if (f3.length && f2.length && f1.length) {
            $('#place_order').prop('disabled', false);
        } else {
            $('#place_order').prop('disabled', true);
        }
    }
}

$('#nova-poshta-shipping-info select').on('change', checkBillingInfo);
$('#billing_address_1, #billing_city, #billing_postcode').on('keyup', checkBillingInfo);

// Add to cart button
// const $orderBtn = $('.order__btn');
// $orderBtn.prop('disabled', true);
// $('.order__select').on('change', function () {
//     $orderBtn.prop('disabled', !$(this).val());
// });


const $storesList = $('.stores__list li');
$storesList.on('click', function () {
    const index = $storesList.index($(this));
    const frames = $('.stores__frame');

    $storesList.removeClass('stores__item--active');
    $(this).addClass('stores__item--active');

    if (frames[index]) {
        frames.removeClass('stores__frame--active');
        $(frames[index]).addClass('stores__frame--active');
    }
});
if ($('#billing_country').val() === 'UA') {
    $('#billing_postcode').val('00000');
} else {
    $('#billing_postcode').val('');
}

$('#billing_country').on('change', function (event) {
    if (event.target.value === 'UA') {
        $('#billing_postcode').val('00000');
    } else {
        $('#billing_postcode').val('');
    }
});
