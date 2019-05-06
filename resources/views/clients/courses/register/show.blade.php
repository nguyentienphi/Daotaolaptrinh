@section('title', $course->name)
@section('content')
    <section class="section-detail-course-video">
    </section>
    <div class="overview">
        <div class="col-md-12">
            <h4>@lang('course.overview')</h4>
            <p>{{ $course->description }}</p>
        </div>
        <div class="col-md-12 content-course-detail">
            @if (!$videos->isEmpty())
                <h4>@lang('course.content')</h4>
                <div class="show-course-detail">
                    @foreach ($videos as $video)
                        <div class="row show-content-video">
                            <div class="col-md-4">
                                {{ $video->title }}
                            </div>
                            <div class="col-md-7">
                                {{ $video->description }}
                            </div>
                            <div class="col-md-1">
                                <a href="{{ route('video-course', $video->id) }}" class="btn btn-primary">@lang('course.view')</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
                <div>
                    <a href="{{ route('show-course', $course->id) }}/#rating">@lang('course.rate_course')</a>
                </div>
                <hr>
                <div class="box-show-test">
                    <h4>@lang('course.test_list')</h4>
                    @foreach($tests as $test)
                       <div class="row item-test">
                            @if (count($test->points))
                            @php
                                $check = false;
                            @endphp
                            @foreach($test->points as $point)
                                @if ($point->test_id == $test->id && Auth::user()->id == $point->user_id)
                                    @php
                                        $check = true;
                                    @endphp
                                @endif
                            @endforeach

                            @if ($check)
                                <div class="col-md-6">
                                    <a href="{{ route('test.doing.details', $test->id) }}">{{ $test->name }}</a>
                                </div>
                                <div class="col-md-4">
                                    <span class="status-test">@lang('test.doing')</span>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <a href="{{ route('test.doing', $test->id) }}">{{ $test->name }}</a>
                                </div>
                            @endif
                        @else
                            <div class="col-md-8">
                                <a href="{{ route('test.doing', $test->id) }}">{{ $test->name }}</a>
                            </div>
                        @endif
                       </div>
                    @endforeach
                </div>
            @else
                <div class="col-md-12">
                    @include('clients.layouts.empty')
                </div>
            @endif
        </div>
    </div>
@endsection
@extends('clients.layouts.master')
