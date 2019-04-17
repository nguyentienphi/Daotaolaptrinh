@section('title', trans('lang.all_notification'))
@extends('clients.layouts.master')
@section('content')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>
    <div class="container">
        <h3 class="text-center">@lang('lang.notification')</h3>
            <div class="box-show-notification">
                @if (!$notifications->isEmpty())
                @foreach ($notifications as $notification)
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 {{ $notification->read_at == null ? 'notification_unread' : 'notification-read' }}">
                            @if ($notification->data['comment'])
                                <div class="item-notification" data-url="{{ route('update-notification', $notification->id) }}">
                                    <input type="hidden" name="postId" value="{{ $notification->data['post']['id'] }}">
                                    <a href="" class="user-all-notification">{{ $notification->data['user']['name'] }}</a>
                                    <a href="{{ route('update-notification', $notification->id) }}">
                                        @if ($notification->data['comment']['parent_id'] == config('settings.comment'))
                                        @lang('comment.comment') @lang('comment.two_dots')
                                        @else
                                            @lang('comment.reply_post')
                                        @endif
                                    </a>
                                    <a href="javascript:void(0)" class="post-all-notification view-post">{{ $notification->data['post']['title'] }}</a>
                                </div>
                            @else
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
           @else
                @include('clients.layouts.empty')
           @endif
    </div>
@endsection
