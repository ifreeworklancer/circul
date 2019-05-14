





$('body').on('click' , '.item__increment' , function() {
        
    var inputAmount = $(this).siblings('.item__value');

    var inputAmountVal = $(this).siblings('.item__value').text();

    var originalQtyInp = $(this).parent().siblings('.original-qty').find('input[type=number]')

    inputAmountVal++;

    $(inputAmount).text(inputAmountVal);

    $(originalQtyInp).val(inputAmountVal);

    // $(originalQtyInp).trigger( "change" );

    $(originalQtyInp).on('change' , function(){
        console.log($(originalQtyInp).val());
    })

    $('button[name="update_cart"]').removeAttr("disabled");

});


$('body').on('click' , '.item__decrement' , function() {
        
    var inputAmount = $(this).siblings('.item__value');

    var inputAmountVal = $(this).siblings('.item__value').text();

    var originalQtyInp = $(this).parent().siblings('.original-qty').find('input[type=number]')

    inputAmountVal--;

    if (inputAmountVal == 0) {
        inputAmountVal = 1;
    }

    $(inputAmount).text(inputAmountVal);

    $(originalQtyInp).val(inputAmountVal);

    // $(originalQtyInp).trigger( "change" );

    $(originalQtyInp).on('change' , function(){
        console.log($(originalQtyInp).val());
    })

    $('button[name="update_cart"]').removeAttr("disabled");
    
});