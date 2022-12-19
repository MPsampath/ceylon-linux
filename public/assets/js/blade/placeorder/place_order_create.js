var producArray = [];
validation_mainform = {
    customr : {required: true},
    ordnum : {required: true},
    productArray : {required: false},
};

validation_items = {
    product : {required: true},
    quntity : {required: true},
};
/*------------------------------------------------
---------------submit main form-----------
--------------------------------------------------*/
jQuery(document).ready(function() {
    $('#save').click(function(e) {
        if ( $('#productArray').val() != '') {
            
            var isValid = validateForm(validation_mainform);
            if (isValid) {
                document.forms["mfrm"].submit();
            }
        }else{
            alert("You must add products to PO");
        }

       
    });
});

function validateForm(validationRules){
    $("#mfrm").validate().destroy();
    $("#mfrm").validate({
        onsubmit: false,
        onkeyup: false,
        onkeydown:false,
        onclick: false,
        onkeypress:false,
        onblur:true,
        ignore: [],
        rules: validationRules,
        errorPlacement: function(error, element) {
            if(element.hasClass('date-picker')){
                error.insertAfter(element.parent());
            } else if(element.parent().hasClass('input-group')){
                error.insertAfter(element.parent());
            }else if(element.hasClass('selectpicker')){
                error.insertAfter(element.parent());
            }else if(element.hasClass('tablefeilds')){
                error.insertBefore(element);
            }else if(element.hasClass('tableselect')){
                error.insertBefore(element);
            }else {
                error.insertAfter(element);
            }
        },
    });

    if($('#mfrm').valid()) {
        return true;
    }else{
        // warningAlert();
        return false;
    }
}

$("#product").on('change',function(event) {
    var productId = $(this).val();
    var freeData = JSON.parse($('#product option:selected').attr('data-free'));
    var productName = $('#product option:selected').attr('data-prname');
    var productCode = $('#product option:selected').attr('data-code');
    var productCost = $('#product option:selected').attr('data-cost');
    $('#product_table .procode').text(productCode);
    $('#product_table .price').text(productCost);
});

$("#quntity").on('change',function(event) {
    var quntyty = $(this).val();
    var freeData = JSON.parse($('#product option:selected').attr('data-free'));
    var productName = $('#product option:selected').attr('data-prname');
    var productCode = $('#product option:selected').attr('data-code');
    var productCost = $('#product option:selected').attr('data-cost');
    var freeissuesqty = 0;
    if (freeData.typ == 2) {
        freeissuesqty = Math.trunc((freeData.fqt/freeData.pqt)*quntyty);
    }else{
        freeissuesqty = freeData.pqt <= quntyty?freeData.fqt:0;
    }
    $('#product_table .amount').text(quntyty*productCost);
    $('#product_table .free').text(freeissuesqty);
});

$('#btn-itemAdd').click(function(e) {
    var isValid = validateForm(validation_items);
    if (isValid) {
        var productId = $("#product").val();
        var quntyty = $("#quntity").val();
        var freeData = JSON.parse($('#product option:selected').attr('data-free'));
        var productName = $('#product option:selected').attr('data-prname');
        var productCode = $('#product option:selected').attr('data-code');
        var productCost = $('#product option:selected').attr('data-cost');
        var freeissuesqty = 0;
        var amount = quntyty*productCost;
        if (freeData.typ == 2) {
            freeissuesqty = Math.trunc((freeData.fqt/freeData.pqt)*quntyty);
        }else{
            freeissuesqty = freeData.pqt <= quntyty?freeData.fqt:0;
        }
        var isAlredyAdded = producArray.findIndex((row) => {
            return (row.productId == productId);
        });

    if (isAlredyAdded == -1) { 
    var produtobject = {productId:productId,quntyty:quntyty,productName:productName,productCode:productCode,productCost:productCost,freeissuesqty:freeissuesqty,amount:amount};
    producArray.push(produtobject);
    clearTable();
    }else{
        alert("This product alredy add");
        clearTable();
    }
    createTableRaw();
}

});

$(".integer").on('keydown',function(event) {
    //event.preventDefault();
    // Allow: backspace, delete, tab, escape and enter
    if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                     // let it happen, don't do anything
                     return;
    }else{
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                    event.preventDefault();
            }
    }
});


function clearTable() {
    $("#product").val('');
    $("#quntity").val('');
    $('#product_table .procode').text('');
    $('#product_table .price').text('');
    $('#product_table .amount').text('');
    $('#product_table .free').text('');
}

function createTableRaw() {
    $('#productArray').val(JSON.stringify(producArray));
    var html = footHtml ='';
    var total = 0;
    if (producArray.length > 0) {
        producArray.map((val, index) => {
            
            html +=
                `<tr><td width="">` +(index + 1) + `.</td>
                <td> ` + val.productName +`</td>
                <td> ` + val.productCode +`</td>
                <td class="text-end"> ` + val.productCost +`</td>
                <td class="text-end"> ` + val.quntyty +`</td>
                <td class="text-end"> ` + val.freeissuesqty +`</td>
                <td class="text-end"> ` + val.amount +`</td>
                </tr>`;

                total += val.amount;
        });
        
        footHtml+='<tr><td class="text-end" colspan="7"><span class=" fw-bold">'+total+'</span></td></tr>';
    }
    $('#product_table tbody').html(html);
    $('#product_table tfoot').html(footHtml);
}
