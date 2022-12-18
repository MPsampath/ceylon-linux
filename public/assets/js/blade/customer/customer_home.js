$('#customer_table').on('click', '.preview', function(e) {
    // e.preventDefault();
    var token=$(this).attr('data-custid');
    console.log(token);
    if(token==''){

    }else{
        var url = cutomer_preview+"?token="+token+"";
        window.location.href=url;
    }
});

$('#customer_table').on('click', '.edit', function(e) {
    // e.preventDefault();
    var token=$(this).attr('data-custid');
    if(token==''){

    }else{
        var url = cutomer_edit+"?token="+token+"";
        window.location.href=url;
    }
});