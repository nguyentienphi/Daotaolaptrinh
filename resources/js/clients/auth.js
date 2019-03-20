$(document).ready(function () {
    $(document).on('submit', '#formRegister', function (e) {
        e.preventDefault();
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json'
        })
        .done(function (data) {
            if (data) {
                location.reload();
            }
        })
        .fail(function (data) {
            var errors = JSON.parse(data.responseText).errors;

            if (errors.name) {
                $('.name-messages').text(errors.name);
                $('#name').css('border-color', 'red');
                $('.name-messages').css({'color' : 'red', 'font-size' : '14px'});
            }

            if (errors.email) {
                $('#email-register').css('border-color', 'red');
                $('.email-messages').css({'color' : 'red', 'font-size' : '14px'});
                $('.email-messages').text(errors.email);
            }

            if ($.inArray(Lang.get('validation.confirmed', {'attribute' : 'password'}), errors.password) >= 0) {
                var errorsPasswordConfirmation = errors.password.slice(-1);
                errors.password = errors.password.slice(0, -1);
                $('#password-confirm').css('border-color', 'red');
            }

            if (errors.password) {
                $('#password-register').css('border-color', 'red');
                $('.password-messages').text(errors.password);
                $('.password-messages').css({'color' : 'red', 'font-size' : '14px'});
            }

            $('.password-confirmation-messages').text(errorsPasswordConfirmation);
            $('input[type=password]').val('');
        });
    });

   $('.modal-body').on('focus', 'input.validate, textarea.validate', function () {
        $(this).parent().find('.help-block').text('');
        $(this).parent().find('.validate').css('border-color', '');
    });
});
