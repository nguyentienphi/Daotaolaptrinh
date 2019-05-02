$(document).ready(function () {
    $('#starRating').starRating({
        callback : function (value) {
            $('#starRatingValue').val(value);
        }
    });
    $(document).on('submit', '#formRating', function (e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        var rate = $('#starRatingValue').val();
            $.ajax({
                method : $(this).attr('method'),
                url : $(this).attr('action'),
                dataType : 'json',
                data : data,
                success : function (data) {
                    if (data.success) {
                        location.reload();
                    }
                },
                error : function (data) {
                    var errors = JSON.parse(data.responseText).errors;
                    if (errors.contentRating) {
                        $('#message-content-rating').text(errors.contentRating);
                        $('#message-content-rating').css({'color' : 'red', 'font-size' : '13px'})
                    }

                    if (errors.starRatingValue) {
                        $('#message-rating').text('Bạn phải chọn số lượng sao trước khi gửi đánh gía');
                        $('#message-rating').css({'color' : 'red', 'font-size' : '13px'})
                    }
                }
            });
        $('.star').hover(function () {
            $('#message-rating').text('');
        })

        $('#content-rating').focus(function () {
             $('#message-content-rating').text('');
        })
    })
})
