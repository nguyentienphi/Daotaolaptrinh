$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if ($('.btn-show-pupup-login').is(':visible')) {
        setTimeout(function() {
            $('#modalLogin').modal('show');
        }, 500);
    }

    var path = window.location.href;
    $('.list-menu-profile a[href="'+path+'"]').addClass('active');

    if ($('.show-notice').is(':visible')) {
        setTimeout(function() {
            $('.show-notice').hide();
        }, 1500);
    }

    $('.counter').each(function () {
        var $this = $(this);
        $({ Counter: 0 }).animate({ Counter: $this.text() }, {
            duration: 1000,
            easing: 'swing',
            step: function () {
              $this.text(Math.ceil(this.Counter));
            }
        });
    });

    //modal register course false
    var coin = parseInt($('.coin').val());
    var price = parseInt($('.price').val());
    var remain = coin - price;
    var course_id = parseInt($('.course_id').val());

    function showResult() {
        $('.show-coin-user').text(coin);
        $('.show-price-course').text(price);
        $('.result-register-course').text(remain);
    }

    $(document).on('click', '#btn-register-course', function () {
        if (coin < price) {
            setTimeout(function() {
                showResult();
                $('#modalcoin').modal('show');
            }, -50);
        } else {
            setTimeout(function() {
                showResult();
                $('#modalRegisterCoin').modal('show');
            }, -50);
        }

    });

    $(document).on('submit', '#registerCourse', function (e) {
        e.preventDefault();
        $.ajax({
            url : $(this).attr('action'),
            method : $(this).attr('method'),
            dataType : 'json',
            data : {
                'remain' : remain,
                'course_id' : course_id
            },
            success : function (data) {
                if (data.success) {
                    $(window).attr('location', data.redirect);
                } else {
                    $('#modalRegisterCoin').modal('hide');
                    alert(data.message);
                }
            }
        });
    })
});
