$('#ganti').prop("disabled", true);
$('input:checkbox').click(function() {
    if($(this).is(':checked')) {
        $('#ganti').prop("disabled", false);
    }else {
        if($('#id').filter(':checked').length < 1) {
            $('#ganti').attr('disabled', true);
        }
    }
});