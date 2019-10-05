$(window).load(function(){
    $('#ldusrmsusr_field_box').hide();
})

$('#field-lvusrmsusr').chosen().change(function(){
    if($('#field-lvusrmsusr').chosen().val() == 'watcher'){
        $('#ldusrmsusr_field_box').show();
    }
    else {
        $('#ldusrmsusr_field_box').hide();
    }
})