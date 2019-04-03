@section('title', $course->name)
@section('content')
    <section class="section-detail-course-video">
    </section>
    <div class="box-show-content-video">
        <div class="container">
            <div class="row">
                @if (!$videos->isEmpty())
                    <div class="col-md-4 show-detail-course">
                        <h4 class="text-center title-course-detail">@lang('course.content')</h4>
                        <div class="show-content-course">
                            <ul style="list-style-type:none" class="show-title-video">
                                @foreach ($videos as $video)
                                    <li><a href="{{ route('show-video-ajax') }}" class="video" id="{{$video->id}}">{{ $video->title }}</a></li>
                                @endforeach
                                <li><a href="" class="rate">@lang('course.rate_course')</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="show-video">
                            <video width="100%" height="auto" controls autoplay>
                                <source src="{{ asset($videos->first()->url) }}" type="video/mp4" class="video">
                            </video>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        @include('clients.layouts.empty')
                    </div>
                @endif
            </div>
        </div>
    </div>
        <div class="row overview">
            <div class="col-md-12">
                <h4>@lang('course.overview')</h4>
                <p>{{ $course->description }}</p>
            </div>
        </div>
@endsection
@extends('clients.layouts.master')
