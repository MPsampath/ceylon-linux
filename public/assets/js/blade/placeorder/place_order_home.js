$('#free_issue_table').on('click', '.preview', function(e) {
    // e.preventDefault();
    var token=$(this).attr('data-friid');
    console.log(token);
    if(token==''){

    }else{
        var url = free_issue_preview+"?token="+token+"";
        window.location.href=url;
    }
});

$('#free_issue_table').on('click', '.edit', function(e) {
    // e.preventDefault();
    var token=$(this).attr('data-friid');
    if(token==''){

    }else{
        var url = free_issue_edit+"?token="+token+"";
        window.location.href=url;
    }
});