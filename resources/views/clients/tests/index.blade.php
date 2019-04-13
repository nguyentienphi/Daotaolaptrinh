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
                <h2 class="mb-3">@lang('test.list')
                    <a href="{{ route('create-test', $course->id) }}" class="btn btn-info">@lang('test.add')</a>
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row show-list-test">
            @if (!$tests->isEmpty())
                <table class="table table-bordered table-list-post">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">@lang('test.stt')</th>
                            <th width="25%" class="text-center">@lang('test.name')</th>
                            <th class="text-center" width="10%">@lang('test.number_question')</th>
                            <th class="text-center" width="20%">@lang('test.date_created')</th>
                            <th class="text-center" width="20%">@lang('test.course')</th>
                            <th width="16%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tests as $test)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td title="{{$test->name}}" class="content-title">{{ $test->name }}</td>
                                <td  class="text-center">{{ count($test->questions) }}</td>
                                <td class="text-center">{{ $test->created_at }}</td>
                                <td class="text-center">{{ $test->course->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('show-test', $test->id) }}" title={{trans('lang.view')}}><i class="ti-eye action-post view"></i></a>
                                    <a href="" title={{trans('lang.edit')}}><i class="ti-pencil action-post edit"></i></a>
                                    <a href="" title={{trans('lang.delete')}} class="confirm-delete"><i class="ti-trash action-post delete"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate">
                    {{ $tests->links() }}
                </div>
            @else
                <div class="col-md-2"></div>
                <div class="col-md-8">@include('clients.layouts.empty')</div>
                <div class="col-md-2"></div>
            @endif
        </div>
    </div>
@endsection
