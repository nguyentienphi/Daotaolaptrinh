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
});
