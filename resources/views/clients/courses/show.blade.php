@section('title', $course->name)
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap banner_setting">
        {{ Html::image(asset('storage/image/bg/banner.jpg'), '', ['class' => 'img_banner_course_detail']) }}
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course-detail">
                <div class="content_wrapper">
                    <h3 class="title">{{ $course->name }}</h3>
                    <div class="content">{{ $course->description }}</div>
                    <hr>
                    <h3 class="title">@lang('lang.course_outline')</h3>
                    <div class="content">
                        <ul class="course_list">
                            @foreach ($course->videos as $video)
                                <li class="justify-content-between d-flex">
                                    <p class="title_course_details">{{ $video->title }}</p>
                                    <p class="description_course_details">{{ $video->description }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 right-contents">
                <ul>
                    <li>
                        <div class="justify-content-between d-flex">
                            <p>@lang('course.price')</p>
                            <span>{{ $course->price }} @lang('course.coin')</span>
                        </div>
                    </li>
                    <li>
                        <div class="justify-content-between d-flex">
                            <p>@lang('course.count_register')</p>
                            <span>{{ count($course->users) }}</span>
                        </div>
                    </li>
                    <li>
                        <div class="justify-content-between d-flex">
                            <p>@lang('course.create_date')</p>
                            <span>{{ $course->created_at }}</span>
                        </div>
                    </li>
                </ul>
                {{ Form::open() }}
                    {{ Form::submit(trans('course.register'), ['class' => 'btn-register-course form-control']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
