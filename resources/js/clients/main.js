$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if ($('.btn-show-pupup-login').is(':visible')) {
        setTimeout(function() {
            $('#modalLogin').modal('show');
        }, 1000);
    }

    var path = window.location.href;
    $('.list-menu-profile a[href="'+path+'"]').addClass('active');
});