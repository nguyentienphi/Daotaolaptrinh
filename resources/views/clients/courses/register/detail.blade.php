@section('title', $video->title)
@section('content')
    <section class="section-detail-course-video">
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="box-title-video">
                    <h4>{{ $video->title }}</h4>
                    <hr>
                <p>{{ $video->description }}</p>
                </div>
            </div>
            <div class="col-md-8 show-detail-course-video">
                <video width="100%" height="100%" controls>
                    <source src="{{ asset($video->url) }}" type="video/mp4">
                </video>
            </div>

        </div>
        <div class="row box-comment-video">
            <div class="col-md-4"></div>
            <div class="col-md-8 comment-video">
                <h4>@lang('lang.comment')</h4>
                <div class="content-comment-video">
                </div>
                {{ Form::open() }}
                    {{ Form::hidden('avatar', asset(Auth::user()->avatar), ['class' => 'avatar']) }}
                    <div class="form-comment-video">
                        <div class="box-img-comment">
                            {{ Html::image(asset(Auth::user()->avatar), '', ['class' => 'img-form-comment']) }}
                        </div>
                        <div class="content-form-comment">
                            {{ Form::textarea('comment', '', ['class' => 'form-control comment-post auto-resize', 'rows' => 1, 'placeholder' => trans('lang.placeholder_comment')]) }}
                        </div>
                        <div class="btn-comment">
                            {{ Form::button(trans('lang.comment'), ['class' => 'btn btn-primary btn-sm']) }}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@extends('clients.layouts.master')
