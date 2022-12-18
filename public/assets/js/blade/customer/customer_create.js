validation_mainform = {
    cusnam : {required: true},
    cutcod : {required: true},
    cutadrs : {required: true},
    cutcontct: {required: true},
};
/*------------------------------------------------
---------------submit main form-----------
--------------------------------------------------*/
jQuery(document).ready(function() {
    $('#save').click(function(e) {

        var isValid = validateForm(validation_mainform);
        if (isValid) {
            
            // $('#warrentyArray').val(JSON.stringify(warrentCheckArray));
            // $('#mfrm').sisyphus().manuallyReleaseData();
            document.forms["mfrm"].submit();
        }
        // else {
        //     warningAlert();
        // }
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

