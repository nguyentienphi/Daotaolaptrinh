@section('title', $post->title)
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>
    <div class="container box-content-post">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 content-post-detail">
                <div class="header-post-detail">
                    <a class="title author-post" href="">{{ $post->user->name }}</a>
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">@lang('post.edit')</a>
                    <div class="statistical">
                        <span title="{{ trans('post.view') }}"><i class="ti-eye icons-post-items"></i>{{ $post->view_number }}</span>
                        <span class="icons-post" title="{{ trans('post.comment') }}"><i class="ti-comment icons-post-items"></i>{{ count($post->comments) }}</span>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12">
                    <h2>{{ $post->title }}</h2>
                    {!! $post->content !!}
                </div>
            </div>
        </div>
        <div class="row show-comment-post">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 box-content-comment-post">
                <h3>@lang('comment.list') ({{ count($post->comments) }})</h3>
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
        </div>
    </div>
@endsection
