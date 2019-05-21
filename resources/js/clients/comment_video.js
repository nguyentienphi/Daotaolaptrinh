$(document).ready(function () {
    $(document).on('submit', '#formCommentVideo', function (e) {
        e.preventDefault();
        var videoId = $('#videoId').val();
        var content = $('#content-comment-video').val()

        $.ajax({
            url : $(this).attr('action'),
            method : $(this).attr('method'),
            dataType : 'json',
            data : {
                videoId : videoId,
                content : content
            },
            success : function (data) {
                $('.show-content-comment-video').append(`
                    <div class="item-comment">
                        <img src="`+ data.image +`" class="img-comment">
                        <div class="content-comment-video">
                            <a href="">` + data.name +`</a>
                            <p>` + content +`</p>
                            <input type="hidden" name="parent-comment-video" value="`+ data.id +`">
                            <a class="reply-video" href="javascript:void(0)">`+ Lang.get('lang.reply') +`</a>
                            <div class="reply-video"></div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                `)
                $('#content-comment-video').val('')
            }
        })
    })
})
