
sumTotal()


$('.invc_DeleteBtn').each(function () {

    $(this).hover(function () {
        let invoiceBtn = $('.invc_DeleteBtn')

        
        if (invoiceBtn.length == 1) {
            console.log(this);
            $(this).css({ 'cursor': 'not-allowed' });
        }
    })


    $(this).on('click', function (e) {

        let invoiceBtn = $('.invc_DeleteBtn')
        e.preventDefault()

        if (invoiceBtn.length > 1) {

            console.log(this.closest('tr'));
            this.closest('tr').remove()
            sumTotal()
            return
        }
    })

})
// $('.invoiceBtn').each(function () {
//     $(this).on('click', function (e) {
//         e.preventDefault()
//         console.log(this.closest('tr'));
//         this.closest('tr').remove()
//         sumTotal()
//         checkDiscountValue()

//         checkValues()


//     })
// })



$('.inp-value').each(function () {
    $(this).on('keyup', (e) => {
        sumTotal(this)
        checkDiscountValue()

        checkValues()


    })
})

function sumTotal(a) {

    let totalAmount;


    $('.inp-value').each(function () {

        if (totalAmount == undefined) {
            console.log('ttttt');
            totalAmount = Number(this.value)

        } else {
            console.log(this.value);
            totalAmount = Number(totalAmount) + Number(this.value)

        }



    })

    let subTotal = $('#subTotal')[0].value = totalAmount

    console.log(subTotal);
    console.log(totalAmount);

    $('#totalDiscount')[0].value = subTotal
    $('#totalAmount')[0].value = subTotal

    checkDiscountValue()
    checkValues()

}



$('#discount').on('keyup', (e) => {
    // let value = e.target.value
    addDiscount()
    checkValues()
})


//Calculating Percentage
function calculateDisocountedPrice(originalPrice, discountPercentage) {
    const discountAmount = (originalPrice * discountPercentage) / 100;
    return discountAmount;
}


function addDiscount() {

    let disAmount = $('#discount')[0].value;

    let subTotal = $('#subTotal')[0].value

    const percentage = calculateDisocountedPrice(disAmount, subTotal);

    console.log(percentage, 'percentage');

    $('#discountAmount')[0].value = percentage;

    let totalDiscount = subTotal - percentage

    $('#totalDiscount')[0].value = totalDiscount

    $('#totalAmount')[0].value = totalDiscount


}



$('#cgst').on('keyup', (e) => {
    // let value = e.target.value
    cgstDiscount();
    checkValues()

    igstRemoveValue()
})


function cgstDiscount() {

    let cgstValue = $('#cgst')[0].value;

    let totalDisount = $('#totalDiscount')[0].value;

    const percentage = calculateDisocountedPrice(cgstValue, totalDisount);

    console.log(percentage, 'cgst');

    $('#cgst_TotalAmount')[0].value = percentage

    let totalAmount = Number(totalDisount) + Number(percentage)

    $('#totalAmount')[0].value = totalAmount

}



$('#sgst').on('keyup', (e) => {
    // let value = e.target.value
    sgstDiscount();
    checkValues()

    igstRemoveValue()

})


function sgstDiscount() {

    let cgst_TotalAmount = $('#cgst_TotalAmount')[0].value

    let sgstValue = $('#sgst')[0].value;

    let totalDisount = $('#totalDiscount')[0].value;

    const percentage = calculateDisocountedPrice(sgstValue, totalDisount);

    console.log(percentage, 'cgst');

    $('#sgst_TotalAmount')[0].value = percentage

    let totalAmount = Number(totalDisount) + Number(percentage) + Number(cgst_TotalAmount)

    console.log(totalAmount, '----------------');

    $('#totalAmount')[0].value = totalAmount

}


$('#igst').on('keyup', (e) => {
    // let value = e.target.value
    igstDiscount();

    cs_gstRemoveValue()

})

function igstDiscount() {

    let igstValue = $('#igst')[0].value;


    let totalDisount = $('#totalDiscount')[0].value;

    const percentage = calculateDisocountedPrice(igstValue, totalDisount);


    $('#igst_TotalAmount')[0].value = percentage

    let totalAmount = Number(totalDisount) + Number(percentage)

    console.log(igstValue, 'ppppppppppppppppppppp');

    $('#totalAmount')[0].value = totalAmount



}


function checkValues() {

    let cgstValue = $('#cgst')[0].value;
    let sgstValue = $('#sgst')[0].value;
    let igstValue = $('#igst')[0].value;


    if (cgstValue != '' && cgstValue != 0) {
        console.log(cgstValue, 'kjjkjk');
        cgstDiscount()
    }


    if (sgstValue != '' && sgstValue != 0) {
        sgstDiscount()
    }



    if (igstValue != '' && igstValue != 0) {
        console.log(igstValue, 'llllllllllll');
        igstDiscount()
    }

}

function checkDiscountValue() {
    let disAmount = $('#discount')[0].value;
    console.log(disAmount);

    if (disAmount != '') {
        addDiscount()
    }

}


function igstRemoveValue() {
    let igstValue = $('#igst')[0].value = '';
    $('#igst_TotalAmount')[0].value = ''
}

function cs_gstRemoveValue() {
    let cgstValue = $('#cgst')[0].value = '';
    let sgstValue = $('#sgst')[0].value = '';

    $('#cgst_TotalAmount')[0].value = '';
    $('#sgst_TotalAmount')[0].value = '';



}


$('#addCSgstBtn').on('click', function (e) {
    e.preventDefault()

    let cgstValue = $('#cgst')[0].value = 9;
    let sgstValue = $('#sgst')[0].value = 9;

    cgstDiscount()
    sgstDiscount()

    igstRemoveValue()

})


$('#addIgstBtn').on('click', function (e) {
    e.preventDefault()

    let igstValue = $('#igst')[0].value = 18;

    igstDiscount()
    cs_gstRemoveValue()

})