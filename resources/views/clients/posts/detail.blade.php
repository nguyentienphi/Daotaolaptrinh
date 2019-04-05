@section('title', 'post details')
@include('clients.layouts.header')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>
    <div class="container box-content-post">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 content-post-detail">
                <div class="header-post-detail">
                    <a class="title author-post" href="">{{ $post->user->name }}</a>
                    @if ($post->user->id != Auth::user()->id)
                        {{ Form::button('<i class="ti-plus"></i> Follow', ['class' => 'btn btn-primary btn-sm']) }}
                    @endif
                    <div style="float: right;">
                        <span title="{{ trans('post.view') }}"><i class="ti-eye icons-post-items"></i>{{ $post->view_number }}</span>
                        <span class="icons-post" title="{{ trans('post.comment') }}"><i class="ti-comment icons-post-items"></i>{{ count($post->comment) }}</span>

                    </div>
                </div>
                <hr>
                <div class="col-lg-10">
                    <h2>{{ $post->title }}</h2>
                    {!! $post->content !!}
                </div>
            </div>
        </div>
        @if (count($morePosts))
            <div class="row">
                <div class="col-lg-11 box-related">
                    <h3 class="more">@lang('post.more')</h3>
                    <div class="row">
                        @foreach ($morePosts as $morePost)
                            <div class="box-show-related-post">
                                <h3><a href="{{ route('post.show', $morePost) }}" class="color-title-post">{{$morePost->title}}</a></h3>
                                <a href="">{{ $morePost->user->name }}</a>
                                <p style="padding-top: 15px;">
                                    <span title="{{ trans('post.view') }}"><i class="ti-eye icons-post-items"></i>{{ $post->view_number }}</span>
                                    <span class="icons-post" title="{{ trans('post.comment') }}"><i class="ti-comment icons-post-items"></i>{{ count($post->comment) }}</span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 container-comment">
                <h3>@lang('post.post_comment')</h3>
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
