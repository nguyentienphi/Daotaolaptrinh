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
                @include('clients.layouts.search')
                @if (!$postUsers->isEmpty() )
                    <table class="table table-bordered table-list-post">
                        <thead>
                            <tr>
                                <th class="text-center">@lang('post.stt')</th>
                                <th width="25%" class="text-center">@lang('post.title')</th>
                                <th class="text-center">@lang('post.create_date')</th>
                                <th class="text-center">@lang('post.statistical')</th>
                                <th class="text-center">@lang('post.status')</th>
                                <th width="16%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($postUsers as $postUser)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td title="{{$postUser->title}}" class="content-title">{{$postUser->title}}</td>
                                    <td class="text-center">{{ $postUser->created_at }}</td>
                                    <td class="text-center">
                                        <span title="{{trans('post.view')}}"><i class="ti-eye icons-post-items"></i>{{ $postUser->view_number }}</span> &nbsp &nbsp
                                        <span title="{{trans('post.comment')}}"><i class="ti-comment icons-post-items"></i>{{count($postUser->comment)}}</span>
                                    </td>
                                    <td class="text-center">
                                        @if ($postUser->status == config('settings.status.approved'))
                                            <span style="background: blue; color: white" class="badge">{{ $postUser->status_custom }}</span>
                                        @elseif ($postUser->status == config('settings.status.waiting_approved'))
                                             <span style="background: red; color: white" class="badge">{{ $postUser->status_custom }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('post.show', $postUser->id) }}" title={{trans('lang.view')}}><i class="ti-eye action-post view"></i></a>
                                        <a href="{{ route('post.edit', $postUser->id) }}" title={{trans('lang.edit')}}><i class="ti-pencil action-post edit"></i></a>
                                        <a href="{{ route('delete-post', $postUser->id) }}" title={{trans('lang.delete')}} class="confirm-delete"><i class="ti-trash action-post delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $postUsers->links() }}
                @else
                    @include('clients.layouts.empty')
                @endif
            </div>

        </div>
    </div>
@endsection
