@section('title', $video->title)
@section('content')
    <section class="section-detail-course-video">
    </section>
    <div class="show-detail-course-video">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <video width="100%" height="100%" controls>
                    <source src="{{ asset($video->url) }}" type="video/mp4">
                </video>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row show-comment-video">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h4>@lang('lang.list_comment') ( {{ count($video->comment) }} )</h4>
                @if (!$comments->isEmpty() )
                    <table class="table table-bordered table-list-post">
                        <thead>
                            <tr>
                                <th class="text-center">@lang('comment.stt')</th>
                                <th width="50%" class="text-center">@lang('comment.content')</th>
                                <th class="text-center">@lang('comment.user')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td title="{{$comment->content}}" class="content-title">{{$comment->content}}</td>
                                    <td class="text-center">{{ $comment->user->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate">
                        {{ $comments->links() }}
                    </div>
                @else
                    @include('clients.layouts.empty')
                @endif
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
@extends('clients.layouts.master')
