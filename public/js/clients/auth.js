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

    $(document).on('submit', '#formLogin', function (e) {
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
            } else {
                $('.login-messages-password').text(Lang.get('auth.failed'));
                $('.login-messages-password').css({'color' : 'red', 'font-size' : '14px'});
                $('#email').css('border-color','red');
                $('#password').css('border-color','red');
                $('input[type=password]').val('');
            }
        })
        .fail(function (data) {
            if (data.responseJSON.errors.email) {
                $('.login-messages').text(Lang.get('auth.failed_email'));
                $('.login-messages').css({'color' : 'red', 'font-size' : '14px'});
                $('#email').css('border-color','red');
            }

            if (data.responseJSON.errors.password) {
                $('.login-messages-password').text(Lang.get('auth.failed_password'));
                $('.login-messages-password').css({'color' : 'red', 'font-size' : '14px'});
                $('#password').css('border-color','red');
            }

            $('input[type=password]').val('');
        });
    });

   $('.modal-body').on('focus', 'input.validate, textarea.validate', function () {
        $(this).parent().find('.help-block').text('');
        $(this).parent().find('.validate').css('border-color', '');
    });
});
