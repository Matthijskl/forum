function submitForm(form) {
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        success: function (data) {
            console.log('succes');
            showSwal('success-message', data);
        },
        error: function (data) {
            console.log(data);
        },

        // complete: function (data) {
        //     console.log('succes');
        //     showSwal('success-message', data);
        // }
    })
}

$('#change_password_request').submit( function(e) {
    e.preventDefault();
    submitForm($(this));
});