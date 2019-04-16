@extends('clients.layouts.master')
@section('content')
    <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>
    <div class="flex-center position-ref full-height">
        <div class="container">
           <div class="title m-b-md">
               <h3 class="room-name">@lang('lang.room_name') {{$roomName}}</h3>
           </div>
            <input type="hidden" id="user-id" value="{{ Auth::user()->id }}">
            <input type="hidden" id="user-name" value="{{ Auth::user()->name }}">
            <input type="hidden" id="access-token" value="{{ $accessToken }}">
            <input type="hidden" id="room-name" value="{{ $roomName }}">
            <div id="media-div" class="row media">
                <div class="col-md-2"></div>
                <div class="row box-chat-room ">
                    <div class="col-md-8 my-media"></div>
                    <div class="col-md-4 other-media"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
    <script src="{{asset('js/clients/video.js')}}"></script>
@endsection
