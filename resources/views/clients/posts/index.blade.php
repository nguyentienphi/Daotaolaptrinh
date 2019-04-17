@section('title', 'post')
@extends('clients.layouts.master')
@section('content')
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
        <div class="row post">
            <div class="col-lg-7 course_details_left">
                @if (!$posts->isEmpty())
                    @foreach ($posts as $post)
                        <div class="content_wrapper">
                            <div>
                                {{ Html::image(asset($post->user->avatar), '', ['class' => 'img-user-post']) }}
                            </div>
                            <div class="content title-post">
                                <input type="hidden" name="postId" value="{{ $post->id }}">
                                <a class="title author-post" href="">{{ $post->user->name }}</a>
                                <p>
                                    <a href="javascript:void(0)" class="color-title-post view-post">{{ $post->title }}</a>
                                </p>
                                <p>
                                    <span title="{{ trans('post.view') }}"><i class="ti-eye icons-post-items"></i>{{ $post->view_number }}</span>
                                    <span class="icons-post" title="{{ trans('post.comment') }}"><i class="ti-comment icons-post-items"></i>{{ count($post->comments) }}</span>
                                </p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @else
                    @include('clients.layouts.empty')
                @endif
            </div>
            <div class="col-lg-4 right-post-content">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nhập tên bài viết">
                </div>
                <hr>
                <h3>@lang('lang.new_post')</h3>
                <hr>
                    @foreach ($postNews as $postNew)
                        <div>
                            <input type="hidden" name="postId" value="{{ $postNew->id }}">
                            <h4><a href="javascript::void(0)" class="color-title-post view-post">{{ $postNew->title }}</a></h4>
                            <span title="{{ trans('post.view') }}"><i class="ti-eye icons-post-items"></i>{{ $postNew->view_number }}</span>
                            <span class="icons-post" title="{{ trans('post.comment') }}"><i class="ti-comment icons-post-items"></i>{{ count($postNew->comments) }}</span>
                            <p><a href="#">{{ $postNew->user->name }}</a></p>
                        </div>
                        <hr>
                    @endforeach
                <h3>@lang('lang.top_author')</h3>
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
@endsection
