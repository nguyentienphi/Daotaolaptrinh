@section('title', trans('lang.list_course'))
@extends('clients.layouts.master')
@section('content')
     <section class="section-list-post-user">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
        @include('clients.layouts.notice')
        @include('clients.profiles.layouts')
    </section>
    <div class="container content-post">
        <div class="row post">
            <div class="col-lg-12 block table-responsive">
                @include('clients.courses.elements.search')
                @if (!$courses->isEmpty() )
                    <table class="table table-bordered table-list-post">
                        <thead>
                            <tr>
                                <th class="text-center">@lang('course.stt')</th>
                                <th width="30%" class="text-center">@lang('course.name')</th>
                                <th width="15%" class="text-center">@lang('course.image')</th>
                                <th width="10%" class="text-center">@lang('course.price')</th>
                                <th class="text-center">@lang('course.date_submit')</th>
                                <th class="text-center" width="10%">@lang('course.number_user')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('show-course-managenent', $course->id) }}">{{ $course->name }}</a></td>
                                    <td>
                                        {{ Html::image(asset($course->image), '', ['class' => 'image-course']) }}
                                    </td>
                                    <td class="text-center">{{ $course->price }} @lang('course.coin')</td>
                                    <td class="text-center">{{ $course->created_at }}</td>
                                    @foreach ($counts as $key => $count)
                                        @if ($key == $course->id)
                                             <td class="text-center">{{ $count }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate-course">
                        {{ $courses->links() }}
                    </div>
                @else
                    @include('clients.layouts.empty')
                @endif
            </div>
        </div>
    </div>
@endsection
