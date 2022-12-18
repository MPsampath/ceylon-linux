$('#product_table').on('click', '.preview', function(e) {
    // e.preventDefault();
    var token=$(this).attr('data-proid');
    console.log(token);
    if(token==''){

    }else{
        var url = product_preview+"?token="+token+"";
        window.location.href=url;
    }
});

$('#product_table').on('click', '.edit', function(e) {
    // e.preventDefault();
    var token=$(this).attr('data-proid');
    if(token==''){

    }else{
        var url = product_edit+"?token="+token+"";
        window.location.href=url;
    }
});