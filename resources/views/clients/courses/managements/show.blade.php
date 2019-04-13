@section('title', $course->name)
@section('content')
    <section class="section-detail-course-video">
    </section>
    <div class="row overview">
        <div class="col-md-9">
            <h4>@lang('course.overview')</h4>
            <p>{{ $course->description }}</p>
            <div class="content-course-detail">
                @if (!$videos->isEmpty())
                <h4>@lang('course.content')</h4>
                    @foreach ($videos as $video)
                        <div class="row show-content-video">
                            <div class="col-md-4">
                                {{ $video->title }}
                            </div>
                            <div class="col-md-6">
                                {{ $video->description }}
                            </div>
                            <div class="col-md-1">
                                <a href="{{ route('show-course-video-detail', $video->id) }}" class="btn btn-primary">@lang('course.view')</a>
                            </div>
                        </div>
                    @endforeach
                    <div>
                        <a href="">@lang('course.lastexercise')</a> || <a href="">@lang('course.rate')</a>
                    </div>
                @else
                    <div class="col-md-12">
                        @include('clients.layouts.empty')
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="show-list-user">
                <h4 class="text-center">@lang('course.list_user')</h4>
                <hr>
                @foreach ($users as $user)
                    <p>{{ Html::image(asset($user->avatar), null, ['class' => 'user-imgaes']) }}
                        <span>{{ $user->name }}</span>
                    </p>
                @endforeach
                <div>
                    <p>{{ $users->links() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('clients.layouts.master')
