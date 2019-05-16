$(document).ready(function () {

    $(document).on('click', '#btn-follow', function (e) {
        e.preventDefault();
        var element = $(this).parent();
        var userId = parseInt($(this).data('id'));

        $.ajax({
            url : $(this).attr('href'),
            method : 'get',
            data : {
                data : userId
            },
            dataType : 'json',
            success : function (data) {
                if (data.success) {
                    $(element).html(`
                        <a href="/un-follow" data-id = ` + data.userId + ` class="btn btn-primary btn-sm" id="btn-unfollow">Bõ theo dõi</a>
                    `)
                } else {
                    alert(data.message);
                }
            }
        })
    })

    $(document).on('click', '#btn-unfollow', function (e) {
        e.preventDefault();
        var element = $(this).parent();
        var userId = parseInt($(this).data('id'));

        $.ajax({
            url : $(this).attr('href'),
            method : 'get',
            data : {
                data : userId
            },
            dataType : 'json',
            success : function (data) {
                if (data.success) {
                   $(element).html(`
                        <a href="/follow" data-id = ` + data.userId + ` class="btn btn-primary btn-sm" id="btn-follow"><i class="ti-plus"></i>Theo dõi</a>
                    `)
                } else {
                    alert(data.message)
                }
            }
        })
    })
})
