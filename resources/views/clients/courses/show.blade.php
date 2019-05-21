
@section('title', $course->name)
@extends('clients.layouts.master')
@section('content')
    @if (Session::has('register_course_false'))
        {{ Html::link('#', '', [
            'class' => 'btn-show-pupup-coin',
        ]) }}
    @endif
    @guest
    @else
        {{ Form::hidden('price', $course->price, ['class' => 'price']) }}
        {{ Form::hidden('coin', Auth::user()->coin_number, ['class' => 'coin']) }}
    @endguest
    <section class="section_gap banner_setting">
        {{ Html::image(asset('storage/image/bg/banner.jpg'), '', ['class' => 'img_banner_course_detail']) }}
    </section>
    <div class="container">
        @guest
        @else
            @php
                $check = false;
            @endphp
            @foreach($course->users as $user)
                @if ($user->id == Auth::user()->id && Auth::user()->role == config('settings.user'))
                    @php
                        $check = true;
                    @endphp
                @endif
            @endforeach
        @endguest
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
                            <span>{{ count($users) }}</span>
                        </div>
                    </li>
                    <li>
                        <div class="justify-content-between d-flex">
                            <p>@lang('course.create_date')</p>
                            <span>{{ $course->created_at }}</span>
                        </div>
                    </li>
                </ul>
                {{ Form::hidden('course_id', $course->id, ['class' => 'course_id', 'id' => 'course_id']) }}
                @guest
                    {{ Form::button(trans('course.register'), ['class' => 'btn-register-course form-control', 'data-toggle' => 'modal', 'data-target' => '#modalLogin']) }}
                @else
                    @if(Auth::user()->role == 3)
                        {{ Form::button(trans('course.register'), ['class' => 'btn-register-course form-control', 'id' => 'message-course', 'data-target' => '#messaseCourse', 'data-toggle' => 'modal']) }}
                    @elseif ($check)
                        <a href="{{ route('course-detail', $course->id) }}" class="btn btn-success form-control">@lang('course.get_course')</a>
                    @else
                        {{ Form::button(trans('course.register'), ['class' => 'btn-register-course form-control', 'id' => 'btn-register-course']) }}
                    @endif
                @endguest
            </div>
        </div>
            <div class="row" style="margin-bottom: 20px" id="rating">
                <div class="col-lg-8 course-detail" >
                    <div>
                        <h3>@lang('course.rate')({{count($course->rates)}})</h3>
                        <hr>
                        @foreach($ratings as $rating)
                            <div style="padding: 10px">
                                <div>
                                    <p class="user-name-rating">{{ $rating->user->name }}</p>
                                    <p class="content-rating">{{ $rating->content }}</p>
                                    <div class="jstars" data-value="{{ $rating->rate }}"></div>
                                    <p class="create-rating">{{ $rating->created_at }}</p>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-contents form-rate">
                        <h4> @lang('course.rate_number', ['rate_number' => count($course->rates)])</h4>
                        <hr>
                        @guest
                            <div style="padding: 10px">
                                <p>@lang('course.rate_not_login')</p>
                            </div>
                        @else
                            @if ($check)
                                <div style="padding: 10px">
                                    <h5 class="text-center">@lang('course.rate_user')</h5>
                                    <ul id="starRating"
                                        data-stars="5" class="star">
                                    </ul>
                                    <span id="message-rating"></span>
                                    {{ Form::open(['id' => 'formRating', 'route' => 'rating.store']) }}
                                        <input type="hidden" name="starRatingValue" id="starRatingValue">
                                        <input type="hidden" name="courseId" value="{{ $course->id }}">
                                        <div class="form-group">
                                            <label>@lang('course.content_rate')</label>
                                            {{ Form::textarea('contentRating', '', ['class' => 'form-control', 'rows' => 3, 'id' => 'content-rating']) }}
                                            <span id="message-content-rating"></span>
                                        </div>
                                        {{ Form::submit('Đánh gía', ['class' => 'btn btn-success', 'id' => 'send-rating']) }}
                                    {{ Form::close() }}
                                </div>
                            @else
                                <div style="padding: 10px">@lang('course.rate_not_member')</div>
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
    </div>
    <div class="modal" id="messaseCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('lang.title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn không được phép đăng ký khóa học này
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@include('clients.elements.modal_coin')
@include('clients.elements.modal_register_course')
@endsection
@section('js')
    {{ Html::script(asset('js/clients/jstars.min.js')) }}
    {{ Html::script(asset('js/clients/jquery.starrating.js')) }}
    {{ Html::script(asset('js/clients/rating.js')) }}
@endsection

