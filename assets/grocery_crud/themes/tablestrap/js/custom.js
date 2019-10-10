$(window).load(function(){
    $('#ldusrmsusr_field_box').hide();
    $('#fcusrmsusr_field_box').hide();
})

$('#field-lvusrmsusr').chosen().change(function(){
    if($('#field-lvusrmsusr').chosen().val() == 'watcher'){
        $('#ldusrmsusr_field_box').show();
        $('#fcusrmsusr_field_box').show();
    }
    else if($('#field-lvusrmsusr').chosen().val() == 'superadmin'){
        $('#fcusrmsusr_field_box').hide();
        $('#ldusrmsusr_field_box').hide();
    }
    else if($('#field-lvusrmsusr').chosen().val() == 'admin'){
        $('#fcusrmsusr_field_box').hide();
        $('#ldusrmsusr_field_box').hide();
    }
    else if($('#field-lvusrmsusr').chosen().val() == 'leader'){
        $('#fcusrmsusr_field_box').show();
        $('#ldusrmsusr_field_box').hide();
    }
})
