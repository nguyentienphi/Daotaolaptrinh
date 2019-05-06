$(document).ready(function () {
    window.onbeforeunload = function() {
        return 'Confirm reload';
    }

     $(document).on('submit', '#doingTest', function (e) {
        e.preventDefault();
        var error = [];
        var dem = 0;

        $.each($('input[name^="question[question"]'), function () {
            error[dem] = false;
            var element = $(this).parent().parent().find('input:radio[name^="answer[question"]');
            $.each(element, function () {
                if ($(this).is(':checked')) {
                    error[dem] = true;
                }
            })

            dem ++
        })

        var submit = true
        $('.end-test').click(function () {
            $('#checkEndTest').modal('hide')
            submitForm();
        });

        for (var i = 0; i < error.length ; i++) {
            if (!error[i]) {
                submit = false
            }
        }

        if (submit) {
            submitForm()
        } else {
            $('#checkEndTest').modal('show')
        }
    });

    function submitForm(){
        var data = $('#doingTest').serializeArray();
        $.ajax({
            url : $('#doingTest').attr('action'),
            method : $('#doingTest').attr('method'),
            dataType : 'json',
            data : data,
            success : function (data) {
                if (data.success) {
                    window.onbeforeunload = null;
                    $(window).attr('location', data.redirect);
                } else {
                    alert(data.message);
                }
            }
        });
    }

    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.text(minutes + ":" + seconds);

            if (--timer < 0) {
                timer = duration;
            }

            if (minutes == 10 && seconds ==0)
            {
                $('#infomationEndTest').modal('show');
            }

            if (minutes == 0 && seconds == 0) {
                submitForm();
            }

        }, 1000);
    }

    $(function ($) {
        var fiveMinutes = parseInt($('#time').text())*60,
        display = $('#time');
        startTimer(fiveMinutes, display);
    });
})
