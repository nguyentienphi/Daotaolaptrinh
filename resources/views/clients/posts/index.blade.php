@section('title', 'post')
@include('clients.layouts.header')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="main_title">
                <h2 class="mb-3">@lang('lang.title_post')</h2>
                <p>@lang('lang.body_post')</p>
            </div>
        </div>
    </div>
    <div class="container content-post">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="content_wrapper">
                    <div>
                        {{ Html::image(asset('storage/image/bg/18698271_386164775111588_1630485189916696433_n.jpg'), '', ['class' => 'img-user-post']) }}
                    </div>
                    <div class="content title-post">
                        <a class="title author-post" href="">Nguyen Tien Phi</a>
                        <p>
                            <a href="#" class="color-title-post">Nếu bạn người mới bắt đầu học lập trình, bạn nên học một ngôn ngữ lập trình trước</a>
                        </p>
                        <p>
                            <span ><i class="ti-eye icons-post-items""></i>30</span>
                            <span class="icons-post"><i class="ti-comment icons-post-items"></i>30</span>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="content_wrapper">
                    <div>
                        {{ Html::image(asset('storage/image/bg/18698271_386164775111588_1630485189916696433_n.jpg'), '', ['class' => 'img-user-post']) }}
                    </div>
                    <div class="content title-post">
                        <a class="title author-post" href="">Nguyen Tien Phi</a>
                        <p>
                            <a href="#" class="color-title-post">Nếu bạn người mới bắt đầu học lập trình, bạn nên học một ngôn ngữ lập trình trước</a>
                        </p>
                        <p>
                            <span ><i class="ti-eye icons-post-items""></i>30</span>
                            <span class="icons-post"><i class="ti-comment icons-post-items"></i>30</span>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="content_wrapper">
                    <div>
                        {{ Html::image(asset('storage/image/bg/18698271_386164775111588_1630485189916696433_n.jpg'), '', ['class' => 'img-user-post']) }}
                    </div>
                    <div class="content title-post">
                        <a class="title author-post" href="">Nguyen Tien Phi</a>
                        <p>
                            <a href="#" class="color-title-post">Nếu bạn người mới bắt đầu học lập trình, bạn nên học một ngôn ngữ lập trình trước</a>
                        </p>
                        <p>
                            <span ><i class="ti-eye icons-post-items""></i>30</span>
                            <span class="icons-post"><i class="ti-comment icons-post-items"></i>30</span>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="content_wrapper">
                    <div>
                        {{ Html::image(asset('storage/image/bg/18698271_386164775111588_1630485189916696433_n.jpg'), '', ['class' => 'img-user-post']) }}
                    </div>
                    <div class="content title-post">
                        <a class="title author-post" href="">Nguyen Tien Phi</a>
                        <p>
                            <a href="#" class="color-title-post">Nếu bạn người mới bắt đầu học lập trình, bạn nên học một ngôn ngữ lập trình trước</a>
                        </p>
                        <p>
                            <span ><i class="ti-eye icons-post-items""></i>30</span>
                            <span class="icons-post"><i class="ti-comment icons-post-items"></i>30</span>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="content_wrapper">
                    <div>
                        {{ Html::image(asset('storage/image/bg/18698271_386164775111588_1630485189916696433_n.jpg'), '', ['class' => 'img-user-post']) }}
                    </div>
                    <div class="content title-post">
                        <a class="title author-post" href="">Nguyen Tien Phi</a>
                        <p>
                            <a href="#" class="color-title-post">Nếu bạn người mới bắt đầu học lập trình, bạn nên học một ngôn ngữ lập trình trước</a>
                        </p>
                        <p>
                            <span ><i class="ti-eye icons-post-items""></i>30</span>
                            <span class="icons-post"><i class="ti-comment icons-post-items"></i>30</span>
                        </p>
                    </div>
                </div>
                <hr>
            </div>

            <div class="col-lg-4 right-post-content">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nhập tên bài viết">
                </div>
                <h3>Bài viết mới nhất</h3>
                <hr>
                <div>
                    <h4><a href="#" class="color-title-post">Lỗi khi chạy react </a></h4>
                    <span ><i class="ti-eye icons-post-items""></i>30</span>
                    <span class="icons-post"><i class="ti-comment icons-post-items"></i>30</span>
                    <p><a href="#">tac gia</a></p>
                </div>
                <hr>
                <div>
                    <h4><a href="#" class="color-title-post">Làm Thế Nào Để Huỷ Bỏ Tài Khoản?</a></h4>
                    <span ><i class="ti-eye icons-post-items""></i>30</span>
                    <span class="icons-post"><i class="ti-comment icons-post-items"></i>30</span>
                    <p><a href="#">tac gia 1</a></p>
                </div>
                <hr>
                <div>
                    <h4><a href="#" class="color-title-post">Lỗi khi chạy javascript </a></h4>
                    <span ><i class="ti-eye icons-post-items""></i>30</span>
                    <span class="icons-post"><i class="ti-comment icons-post-items"></i>30</span>
                    <p><a href="#">tac gia 3</a></p>
                </div>
                <h3>Top thành viên</h3>
                <hr>
                <div>
                    {{ Html::image(asset('storage/image/bg/18698271_386164775111588_1630485189916696433_n.jpg'), '', ['class' => 'img-user-post']) }}
                </div>
                    <div class="content title-post">
                    <a class="title author-post" href="">Nguyen Tien Phi</a>
                    <br>
                    <p>
                        <span title="Bài viết"><i class="ti-pencil icons-post-items"></i>30</span>
                        <span class="icons-post" title="Theo dõi"><i class="ti-user icons-post-items"></i>30</span>
                    </p>
                    <p><button class="btn btn-primary">Follow</button></p>
                </div>
                <hr>
                <div>
                    {{ Html::image(asset('storage/image/bg/18698271_386164775111588_1630485189916696433_n.jpg'), '', ['class' => 'img-user-post']) }}
                </div>
                    <div class="content title-post">
                    <a class="title author-post" href="">Nguyen Tien Phi</a>
                    <br>
                    <p>
                        <span title="Bài viết"><i class="ti-pencil icons-post-items"></i>30</span>
                        <span class="icons-post" title="Theo dõi"><i class="ti-user icons-post-items"></i>30</span>
                    </p>
                    <p><button class="btn btn-primary">Follow</button></p>
                </div>
            </div>
        </div>
    </div>
@include('clients.layouts.footer')
