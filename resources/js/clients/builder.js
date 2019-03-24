$(document).ready(function () {
     window.onbeforeunload = function() {
        return 'Confirm reload';
    }

    $(document).on('submit', '#formCreatePost', function (e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        $.ajax({
            url : $(this).attr('action'),
            method : $(this).attr('method'),
            data : data,
            dataType: 'json',
            success : function (data) {
                window.onbeforeunload = null;
                $(window).attr('location', data.redirect);
            },
            error : function (data) {
                var errors = JSON.parse(data.responseText).errors;
                if (errors.title) {
                    $('.message-title-post').text(errors.title);
                    $('.message-title-post').css({'color' : 'red', 'font-size' : '14px'});
                }

                if (errors.content) {
                    $('.message-content-post').text(errors.content);
                    $('.message-content-post').css({'color' : 'red', 'font-size' : '14px'});
                }
            }
        })

    });
});
