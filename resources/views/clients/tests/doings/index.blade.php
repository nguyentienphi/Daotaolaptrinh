@section('title', trans('test.title'))
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
        @include('clients.layouts.notice')
    </section>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="text-center">
                <h2 class="mb-3">@lang('test.list')</h2>
            </div>
        </div>
    </div>
    <div class="container box-list-test">
        @foreach ($tests as $test)
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding: 10px">
                    <div class="row">
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
                                <div class="col-md-8">
                                    <a href="{{ route('test.doing.details', $test->id) }}">{{ $test->name }}</a>
                                </div>
                                <div class="col-md-4">
                                    <span class="status-test">@lang('test.doing')</span>
                                    <a href="{{ route('test.doing.details', $test->id) }}" class="btn btn-success btn-sm">@lang('test.detail')</a>
                                </div>
                            @else
                                <div class="col-md-8">
                                    <a href="{{ route('test.doing', $test->id) }}">{{ $test->name }}</a>
                                </div>
                            @endif
                        @else
                            <div class="col-md-8">
                                <a href="{{ route('test.doing', $test->id) }}">{{ $test->name }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
