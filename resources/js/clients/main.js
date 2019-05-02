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
    var course_id = parseInt($('#course_id').val());

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
                            <input type="hidden" name="parent-comment-post" value="`+ data.id +`">
                            <a class="reply" href="javascript:void(0)">`+ Lang.get('lang.reply') +`</a>
                            <div class="reply-content"></div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                `);
                $('.comment-post').val('');
            }
        });
    });

    //reply comment
    $(document).on('submit', '#formReplyCommentPost', function (e) {
        e.preventDefault();
        var post = $('#post').val();
        var element = $(this).closest('div.content_comment');
        var parent_id = element.find('input[name="parent-comment-post"]').val();
        var content = element.find('.content-form-comment .content-reply-post').val();
        var parentCommentReply =  $(element).find('input[name="parent-comment-reply"]').val();

        $.ajax({
            url : '/reply-comment-post',
            method : $(this).attr('method'),
            dataType : 'json',
            data : {
                'post' : post,
                'parent_id' : parent_id,
                'content' : content,
                'parentCommentReply' : parentCommentReply
            },
            success : function (data) {
                element.find('.reply-content').append(`
                    <div class="element-reply">
                        <img src="`+ data.avatar +`" class="img-comment">
                        <p><a href="">`+ data.name +`</a></p>
                        <p>`+ content +`</p>
                        <a href="javascript:void(0)" class="reply-to-reply">`+ Lang.get('lang.reply') +`</a>
                    </div>
                `);
                element.find('.content-form-comment .content-reply-post').val('');
                element.find('input[name="parent-comment-reply"]').val(data.userId);
            }
        });
    });

    //load reply post
    $(document).on('click', '.load-reply-post', function (e) {
        e.preventDefault();
        $(this).closest('div').find('.load-comment').toggle();
    })

    //load url notification
    $(document).on('click', '.item-notification', function () {
        window.location.href = $(this).attr('data-url');
    });

    //load post detail
    $(document).on('click', '.view-post', function (e) {
        e.preventDefault();
        var postId = $(this).parent().parent().find('input[name="postId"]').val();

        $.ajax({
            url : '/update-view-number',
            method : 'get',
            dataType : 'json',
            data : {
                'postId' : postId
            },
            success : function (data) {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    alert(data.message);
                }
            }
        });
    });

    //view detail test
    $('.view-detail').click(function () {
        $('.show-detail').toggle();
    })
});
