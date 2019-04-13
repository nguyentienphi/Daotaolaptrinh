@section('title', $post->title)
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>
    <div class="container box-content-post">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 content-post-detail">
                <div class="header-post-detail">
                    <a class="title author-post" href="">{{ $post->user->name }}</a>
                    @guest
                        {{ Form::button('<i class="ti-plus"></i> Follow', ['class' => 'btn btn-primary btn-sm']) }}
                    @else
                        @if ($post->user->id != Auth::user()->id)
                            {{ Form::button('<i class="ti-plus"></i> Follow', ['class' => 'btn btn-primary btn-sm']) }}
                        @endif
                    @endguest
                    <div style="float: right;">
                        <span title="{{ trans('post.view') }}"><i class="ti-eye icons-post-items"></i>{{ $post->view_number }}</span>
                        <span class="icons-post" title="{{ trans('post.comment') }}"><i class="ti-comment icons-post-items"></i>{{ count($post->comments) }}</span>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12">
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
                                <input type="hidden" name="postId" value="{{ $morePost->id }}">
                                <h3><a href="javascript:void(0)" class="color-title-post view-post">{{$morePost->title}}</a></h3>
                                <a href="">{{ $morePost->user->name }}</a>
                                <p style="padding-top: 15px;">
                                    <span title="{{ trans('post.view') }}"><i class="ti-eye icons-post-items"></i>{{ $morePost->view_number }}</span>
                                    <span class="icons-post" title="{{ trans('post.comment') }}"><i class="ti-comment icons-post-items"></i>{{ count($morePost->comments) }}</span>
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
                <div class="content-comment">
                    @foreach ($comments as $comment)
                        <div class="item-comment">
                            <img src="{{ asset($comment->user->avatar) }}" class="img-comment">
                            <div class="content_comment">
                                <a href="">{{ $comment->user->name }}</a>
                                <p>{{ $comment->content }}</p>
                                <input type="hidden" name="parent-comment-post" value="{{ $comment->id }}">
                                <input type="hidden" name="parent-comment-reply" value="{{ count($comment->replysComment) ? $comment->replysComment->last()->id : $comment->id }}">
                                @guest
                                @else
                                    <a href="javascript:void(0)" class="reply">@lang('lang.reply')</a>
                                @endguest
                                <div class="reply-content">
                                    @if ( $comment->replysComment && count($comment->replysComment))
                                        <p>
                                            <a href="javascript:void(0)" class="load-reply-post">
                                                <span><i class="ti-back-right"></i></span>
                                                {{ count($comment->replysComment) }} @lang('post.reply')
                                            </a>
                                        </p>
                                        <div class="load-comment" style="display: none">
                                            @foreach($comment->replysComment as $reply)
                                                <div class="element-reply">
                                                    <img src="{{ asset($reply->user->avatar) }}" class="img-comment">
                                                    <p><a href="">{{ $reply->user->name  }}</a></p>
                                                    <p>{{ $reply->content }}</p>
                                                    @guest
                                                    @else
                                                        <a href="javascript:void(0)" class="reply-to-reply">@lang('lang.reply')</a>
                                                    @endguest
                                                </div>
                                            @endforeach
                                        </div>
                                   @endif
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>
                    @endforeach
                </div>
                @guest
                    <div>
                        <p><span>@lang('post.checkLogin')</span> <a href="javascript:void(0)" data-toggle="modal" data-target="#modalLogin">@lang('lang.login')</a></p>
                    </div>
                @else
                    {{ Form::open(['id' => 'formCommentPost', 'route' => 'add-comment']) }}
                        {{ Form::hidden('post', $post->id, ['id' => 'post']) }}
                        {{ Form::hidden('avatar', asset(Auth::user()->avatar), ['class' => 'avatar']) }}
                        <div class="form-comment">
                            <div class="box-img-comment">
                                {{ Html::image(asset(Auth::user()->avatar), '', ['class' => 'img-form-comment']) }}
                            </div>
                            <div class="content-form-comment">
                                {{ Form::textarea('comment', '', ['class' => 'form-control comment-post auto-resize', 'rows' => 1, 'placeholder' => trans('lang.placeholder_comment')]) }}
                            </div>
                            <div class="btn-comment">
                                {{ Form::submit(trans('lang.comment'), ['class' => 'btn btn-primary btn-sm']) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    {{ Form::close() }}
                @endguest
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{ Html::script(asset('js/clients/add-form-comment.js')) }}
@endsection
