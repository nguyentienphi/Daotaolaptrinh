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
                {{ Form::open(['method' => 'patch', 'route' => 'profile.update']) }}
                    <div class="row element-information">
                        <div class="col-md-3">@lang('lang.name')</div>
                        <div class="col-md-9 show-detail-information">
                            {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('lang.email')</div>
                        <div class="col-md-9 show-detail-information">
                            {{ Form::text('email', $user->email, ['class' => 'form-control', 'disabled']) }}
                        </div>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('profile.address')</div>
                        <div class="col-md-9 show-detail-information">
                            {{ Form::text('address', $user->address, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('profile.phone')</div>
                        <div class="col-md-9 show-detail-information">
                            {{ Form::text('phone', $user->phone, ['class' => 'form-control '.($errors->has('phone') ? 'border-error' : '')]) }}
                        </div>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('profile.gender')</div>
                        <div class="col-md-9 show-detail-information">
                            <label class="container-radio">
                                {{ Form::radio('gender', config('settings.profile.gender.male'), '',
                                    ['class' => 'form-group checkbox-gender', 'id' => '1',
                                    ($user->gender == config('settings.profile.gender.male')) ? 'checked' : null]) }}
                                @lang('profile.male')
                                <span class="radiobtn"></span>
                            </label>
                            <label class="container-radio">
                                {{ Form::radio('gender', config('settings.profile.gender.female'), '',
                                    ['class' => 'form-group checkbox-gender', 'id' => '2',
                                    ($user->gender == config('settings.profile.gender.female')) ? 'checked' : null]) }}
                                @lang('profile.female')
                                <span class="radiobtn"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        {{ Form::submit(trans('lang.update'), ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    </div>
@endsection
