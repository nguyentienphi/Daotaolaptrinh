@section('title', trans('profile.profile'))
@extends('clients.layouts.master')
@section('content')
    <section class="section-list-post-user">
        {{ Html::image(asset('storage/image/bg/bannerpost.jpg'), '', ['class' => 'img_banner_post']) }}
        @include('clients.layouts.notice')
        @include('clients.profiles.layouts')
    </section>
    <div class="container profile">
        <div class="row">
        @include('clients.profiles.option_information')
            <div class="col-md-7">
                <div class="information">
                    <div class="title-information">
                        <h4>@lang('profile.information_user')</h4>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('lang.name')</div>
                        <div class="col-md-9 show-detail-information">{{ $user->name }}</div>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('lang.email')</div>
                        <div class="col-md-9 show-detail-information">{{$user->email}}</div>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('profile.address')</div>
                        <div class="col-md-9 show-detail-information">{{ $user->address }}</div>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('profile.phone')</div>
                        <div class="col-md-9 show-detail-information">{{ $user->phone }}</div>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('profile.gender')</div>
                        <div class="col-md-9 show-detail-information">{{$user->gender_custom}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
