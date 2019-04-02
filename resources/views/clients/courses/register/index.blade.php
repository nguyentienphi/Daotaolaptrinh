
@section('title', trans('lang.list_post'))
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
                                <th width="25%" class="text-center">@lang('course.name')</th>
                                <th class="text-center">@lang('course.date_register')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td class="text-center">{{ $course->date_register }}</td>
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
