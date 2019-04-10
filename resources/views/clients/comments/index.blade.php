@section('title', trans('lang.list_comment'))
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
                @if (!$comments->isEmpty() )
                    <table class="table table-bordered table-list-post">
                        <thead>
                            <tr>
                                <th class="text-center">@lang('comment.stt')</th>
                                <th class="text-center">@lang('comment.post')</th>
                                <th class="text-center">@lang('comment.content')</th>
                                <th class="text-center">@lang('comment.user')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $comment->commentable->title }}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->user->name }}</td>
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
