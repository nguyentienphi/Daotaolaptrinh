@extends('clients.layouts.master')
@section('content')
   <section class="section_gap">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
    </section>
    <div class="container">
       <div class="title m-b-md">
           <h3 class="title-chat-room">@lang('lang.title_chat_room')</h3>
       </div>
       <div class="form-group">
        {!! Form::open(['route' => 'live-create']) !!}
            <div class="row">
                <div class="col-md-3"></div>
                {!! Form::label('roomName', trans('lang.create_room')) !!}
                <div class="col-md-4">
                    {!! Form::text('roomName', '', ['class' => 'form-control']) !!}
                    @if ($errors->has('roomName'))
                        <span class="error">{{ $errors->first('roomName') }}</span>
                    @endif
                    @guest
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLogin">@lang('lang.login')</a>
                    @else
                        {!! Form::submit('Tạo', ['class' => 'btn btn-primary btn-create-room']) !!}
                    @endguest
                </div>
            </div>
       {!! Form::close() !!}
       </div>
    </div>
@endsection
