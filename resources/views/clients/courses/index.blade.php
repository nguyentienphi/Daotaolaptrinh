@section('title', trans('lang.list_course'))
@extends('clients.layouts.master')
@section('content')
    <section class="banner_area"></section>
    <div class="popular_courses section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="main_title">
                        <h2 class="mb-3">@lang('lang.title_course')</h2>
                        <p>@lang('lang.body_course')</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (!$courses->isEmpty())
                        @foreach ($courses as $course)
                            <div class="box-item-course">
                                <div class="single_course">
                                    <div class="course_content row">
                                        <div class="col-md-3">
                                           {{  Html::image(asset($course->image), '', ['class' => 'img-course'])}}
                                        </div>
                                        <div class="col-md-7">
                                            <p class="name-course"><a href="">{{ $course->name }}</a></p>
                                            <p class="detail-course">
                                                <span>{{ count($course->videos) }} @lang('lang.video')</span>
                                                <span>{{ $course->created_at }}</span>
                                            </p>
                                            <p class="title-course">{{ $course->title }}
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <h5>{{ $course->price }} Xu</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="paginate-course">
                                {{ $courses->links() }}
                            </div>
                        @endforeach
                    @else
                        <div class="single_course">
                            @include('clients.layouts.empty')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
