$(document).ready(function () {
    function elements() {
        var avatar = $('.avatar').val();
        return `
            <form id="formReplyCommentPost" method="POST">
                <div class="form-comment-append">
                    <div class="box-img-comment">
                        <img src="`+ avatar +`" class="img-form-comment">
                    </div>
                    <div class="content-form-comment">
                        <textarea class="form-control content-reply-post" rows="1" placeholder="Nhập nội dung bình luận"></textarea>
                    </div>
                    <div class="btn-comment">
                        <input type="submit" value="Bình luận" class="btn btn-primary btn-sm">
                        <button class="btn btn-primary btn-sm cancle">Hủy</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        `;
    }

     $(document).on('click', '.reply', function () {

        if ($(this).parent().find('.form-comment-append').length == 0) {
            $(this).parent().append(elements());
        }
    });

    $(document).on('click', '.reply-to-reply', function () {
        if ($(this).closest('div.content_comment').find('.form-comment-append').length == 0) {
            $(this).closest('div.content_comment').append(elements());
        }
    });

    $(document).on('click', '.cancle', function () {
        $(this).parent().parent().parent().find('.form-comment-append').remove();
    });
});
