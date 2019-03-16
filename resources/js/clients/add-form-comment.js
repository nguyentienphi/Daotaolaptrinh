$(document).ready(function () {
    function elements() {
        return `
            <form>
                <div class="form-comment-append">
                    <div class="box-img-comment">
                        <img src="./storage/image/bg/banner.jpg" class="img-form-comment">
                    </div>
                    <div class="content-form-comment">
                        <textarea class="form-control" rows="1" placeholder="Nhập nội dung bình luận"></textarea>
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

    $('.reply').click(function () {
        if ($(this).parent().find('.form-comment-append').length == 0) {
            $(this).parent().append(elements)
        }
    });

    $('.reply-to-reply').click(function () {
        if ($(this).parent().parent().parent().find('.form-comment-append').length == 0) {
            $(this).parent().parent().parent().append(elements);
        }
    });

    $(document).on('click', '.cancle', function () {
        $(this).parent().parent().parent().find('.form-comment-append').remove();
    });
});
