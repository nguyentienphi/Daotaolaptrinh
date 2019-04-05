$(document).ready(function() {
    $('.confirm-delete').click(function () {
        var check = confirm('Bạn có muốn xóa?');

        if(check) {
            return true;
        } else {
            return false;
        }
    });
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

     //load video ajax
    $('.show-title-video li:first-child a').addClass('active');
    $('.video').click(function (e) {
        e.preventDefault();
        $(this).closest('ul').find('.video.active').removeClass('active');
        $(this).addClass('active');
        var id_video = $(this).attr('id');

        $.ajax({
            url : $(this).attr('href'),
            method : 'get',
            data : {
                'id_video' : id_video
            },
            success : function (data) {
                if (data.success) {
                    $('.show-video').html(`
                        <video width="100%" height="auto" controls autoplay>
                            <source src="` + data.url +`" type="video/mp4" class="video">
                        </video>
                    `)
                } else {
                    alert(data.errors)
                }
            }
        });
    });

    //comment
    $(document).on('submit', '#formCommentPost', function (e) {
        e.preventDefault();
        var post = $('#post').val();
        var content = $('.comment-post').val();

        $.ajax({
            url : $(this).attr('action'),
            method : $(this).attr('method'),
            dataType : 'json',
            data : {
                'post' : post,
                'content' : content
            },
            success : function (data) {
                $('.content-comment').append(`
                    <div class="item-comment">
                        <img src="`+ data.image +`" class="img-comment">
                        <div class="content_comment">
                            <a href="">` + data.name +`</a>
                            <p>` + content +`</p>
                            <a class="reply" href="javascript:void(0)">`+ Lang.get('lang.reply') +`</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                `);
                $('.comment-post').val('');
            }
        });
    });
});
