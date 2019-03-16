@section('title', 'post details')
@include('clients.layouts.header')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>
    <div class="container" style="margin-bottom: 50px">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 content-post-detail">
                <div class="header-post-detail">
                    <a class="title author-post" href="">Nguyen Tien Phi</a>
                    {{ Form::button('<i class="ti-plus"></i> Follow', ['class' => 'btn btn-primary btn-sm']) }}
                    <div style="float: right;">
                        <span title="Lượt xem"><i class="ti-eye icons-post-items"></i>30</span>
                        <span class="icons-post" title="Bình luận"><i class="ti-comment icons-post-items"></i>30</span>

                    </div>
                </div>
                <hr>
                <div class="col-lg-10">
                    <h2 class="title-post-detail">Làm Thế Nào Để Huỷ Bỏ Tài Khoản?</h2>
                        <h3><strong>1: Gửi một b&aacute;o c&aacute;o lỗi tồi</strong></h3>

                            <p>Bạn muốn l&agrave;m cho c&aacute;c coder gh&eacute;t bạn ngay lập tức? B&aacute;o c&aacute;o một vấn đề quan trọng nhưng mơ hồ hoặc kh&ocirc;ng đầy đủ th&ocirc;ng tin để họ kh&ocirc;ng c&oacute; &yacute; tưởng về vấn đề. Giống như c&aacute;i n&agrave;y:</p>

                            <p><em>Summary: System crashes</em></p>

                            <p><em>Description: The system crashes on my PC several times. Please fix it asap</em></p>

                            <p><em>Steps to reproduce: None</em></p>

                            <p><em>Observed result: None</em></p>

                            <p><em>Expected result: None</em></p>

                            <p>Một b&aacute;o c&aacute;o như thế n&agrave;y sẽ khiến c&aacute;c coder của bạn thất vọng ngay lập tức.</p>

                            <p>Tại sao điều n&agrave;y c&oacute; thể l&agrave;m cho họ gh&eacute;t bạn? Ch&uacute;ng ta đều biết rằng c&aacute;c coder phụ thuộc rất nhiều v&agrave;o b&aacute;o c&aacute;o lỗi của tester để hiểu lỗi v&agrave; sửa n&oacute; đ&uacute;ng c&aacute;ch. Nếu bạn đang gửi cho họ một b&aacute;o c&aacute;o tồi tệ, họ sẽ rất kh&oacute; hoặc mất nhiều thời gian để t&aacute;i hiện v&agrave; fix bug.</p>

                            <h3><strong>2: Chỉ tr&iacute;ch c&aacute;c developer về c&aacute;c lỗi gặp phải</strong></h3>

                            <p>C&aacute;c coder lu&ocirc;n cảm thấy tồi tệ khi bạn t&igrave;m thấy một vấn đề n&agrave;o đ&oacute; trong d&ograve;ng code của họ. Bạn c&oacute; thể đ&atilde; l&agrave;m cho họ cảm thấy tồi tệ hơn khi chỉ ra ch&iacute;nh x&aacute;c Ai l&agrave; người đ&atilde; viết đoạn code g&acirc;y ra lỗi đ&oacute;. Những c&acirc;u n&oacute;i như:</p>

                            <ul>
                                <li>T&ocirc;i nghĩ bạn n&ecirc;n l&agrave;m việc tốt hơn sau khi xử l&yacute; bug n&agrave;y.</li>
                                <li>T&ocirc;i nghĩ rằng đ&acirc;y l&agrave; một thiết kế ngu ngốc m&agrave; bạn đ&atilde; l&agrave;m.</li>
                                <li>Lập tr&igrave;nh vi&ecirc;n đ&atilde; kh&ocirc;ng xử l&yacute; ch&iacute;nh x&aacute;c ngoại lệ n&agrave;y?</li>
                                <li>Tại sao chức năng n&agrave;y kh&ocirc;ng hoạt động ?</li>
                                <li>......</li>
                            </ul>

                            <p>C&aacute;c phản hồi mang t&iacute;nh x&acirc;y dựng chỉ l&agrave;m cho coder th&iacute;ch bạn hơn, v&igrave; vậy h&atilde;y từ bỏ những feedback mang t&iacute;nh ph&aacute; hoại như ở b&ecirc;n tr&ecirc;n.</p>

                            <h3><strong>3: ...Chỉ tr&iacute;ch c&ocirc;ng khai</strong></h3>

                            <p>Bạn muốn mọi thứ tồi tệ hơn? Đừng chỉ ph&ecirc; b&igrave;nh họ m&agrave; phải l&agrave;m điều đ&oacute; c&ocirc;ng khai. Bạn c&oacute; thể chỉ ra tr&aacute;ch nhiệm cho một lập tr&igrave;nh vi&ecirc;n cụ thể trong hệ thống theo d&otilde;i lỗi (như Redmine, Jira...) nơi m&agrave; mọi người c&oacute; thể đọc được c&aacute;c nhận x&eacute;t, đ&aacute;nh gi&aacute; của bạn. Bạn cũng c&oacute; thể l&agrave;m điều n&agrave;y trong c&aacute;c buổi họp nh&oacute;m v&agrave; đặc biệt l&agrave; với đội ngũ quản l&yacute; c&oacute; li&ecirc;n quan. Tại sao n&ecirc;n l&agrave;m điều n&agrave;y? Đ&oacute; l&agrave; v&igrave; bạn đang chạm v&agrave;o một trong những phần nhạy cảm của c&aacute;c coder. Đ&oacute; l&agrave; bản năng của họ.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 container-comment">
                <h3>Bình luận</h3>
                <div class="conten-comment">
                    <div class="item-comment">
                        <img src="{{ asset('storage/image/bg/banner.jpg') }}" class="img-comment">
                        <div class="content_comment">
                            <p>Nguyen tienasd phi
                            </p>
                            <a class="reply" href="javascript:void(0)">@lang('lang.reply')</a>
                            <div class="reply-content">
                                <div class="element-reply">
                                    <img src="{{ asset('storage/image/bg/banner.jpg') }}" class="img-comment">
                                    <p>dhsalkhlfkshalfk</p>
                                    <a href="javascript:void(0)" class="reply-to-reply">@lang('lang.reply')</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                    <div class="item-comment">
                        <img src="{{ asset('storage/image/bg/banner.jpg') }}" class="img-comment">
                        <div class="content_comment">
                            <p>Nguyen tienasd phi
                            </p>
                            <a class="reply" href="javascript:void(0)">Trả lời</a>
                            <div class="reply-content">
                                <div class="element-reply">
                                    <img src="{{ asset('storage/image/bg/banner.jpg') }}" class="img-comment">
                                    <p>dhsalkhlfkshalfk</p>
                                    <a href="javascript:void(0)" class="reply-to-reply">@lang('lang.reply')</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                    {{-- <div class="item-comment">
                        {{ Html::image(asset('storage/image/bg/banner.jpg'), '', ['class' => 'img-comment']) }}
                        <div class="content_comment">
                            <p>Nguyen tienasd phi
                            </p>
                            <a class="reply" href="javascript:void(0)">Trả lời</a>
                            <hr>
                        </div>
                        <div class="clearfix"></div>

                    </div> --}}
                </div>

                {{ Form::open() }}
                    <div class="form-comment">
                        <div class="box-img-comment">
                            {{ Html::image(asset('storage/image/bg/banner.jpg'), '', ['class' => 'img-form-comment']) }}
                        </div>
                        <div class="content-form-comment">
                            {{ Form::textarea('comment', '', ['class' => 'form-control', 'rows' => 1, 'placeholder' => trans('lang.placeholder_comment')]) }}
                        </div>
                        <div class="btn-comment">
                            {{ Form::submit(trans('lang.comment'), ['class' => 'btn btn-primary btn-sm']) }}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@include('clients.layouts.footer')
{{ Html::script(asset('js/clients/add-form-comment.js')) }}
