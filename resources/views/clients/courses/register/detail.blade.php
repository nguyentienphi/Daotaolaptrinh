@section('title', $video->title)
@section('content')
    <section class="section-detail-course-video">
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="box-title-video">
                    <div style="margin-top: 15px; background: #fff">
                    <h4 style="text-align: center;">Thực hành code tại đây</h4>
                    <hr>
                    @include('clients.codes.php')
                </div>
                </div>
            </div>
            <div class="col-md-8 show-detail-course-video">
                <div>
                    <h4>{{ $video->title }}</h4>
                    <hr>
                <p>{{ $video->description }}</p>
                <video width="100%" height="100%" controls>
                    <source src="{{ asset($video->url) }}" type="video/mp4">
                </video>
                </div>
            </div>
        </div>
        <div class="row box-comment-video">
            <input type="hidden" name="">
            <div class="col-md-4"></div>
            <div class="col-md-8 comment-video">
                <h4>@lang('lang.comment')</h4>
               <div class="show-content-comment-video">
                    @foreach ($comments as $comment)
                        @if (Auth::user()->id == $comment->user->id)
                            <div class="item-comment">
                            <img src="{{ asset($comment->user->avatar) }}" class="img-comment">
                            <div class="content-comment-video">
                                <a href="">{{ $comment->user->name }}</a>
                                <p>{{ $comment->content }}</p>
                                <input type="hidden" name="parent-comment-video" value="{{ $comment->id }}">
                                <input type="hidden" name="parent-comment-reply" value="{{ count($comment->replysComment) ? $comment->replysComment->last()->id : $comment->id }}">
                                @guest
                                @else
                                    <a href="javascript:void(0)" class="reply-comment-video">@lang('lang.reply')</a>
                                @endguest
                                <div class="reply-content">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>
                        @endif

                    @endforeach
                </div>
                {{ Form::open(['id' => 'formCommentVideo', 'route' => 'add.comment.video']) }}
                    {{ Form::hidden('videoId',$video->id ,['id' => 'videoId']) }}
                    {{ Form::hidden('avatar', asset(Auth::user()->avatar), ['class' => 'avatar']) }}
                    <div class="form-comment-video">
                        <div class="box-img-comment">
                            {{ Html::image(asset(Auth::user()->avatar), '', ['class' => 'img-form-comment']) }}
                        </div>
                        <div class="content-form-comment">
                            {{ Form::textarea('comment-video', '', ['class' => 'form-control auto-resize', 'rows' => 1, 'placeholder' => trans('lang.placeholder_comment'), 'id' => 'content-comment-video']) }}
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
@endsection
@extends('clients.layouts.master')
@section('js')
    {{ Html::script('js/clients/comment_video.js') }}
@endsection
