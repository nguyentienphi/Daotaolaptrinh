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
                    <h4>@lang('profile.change_password')</h4>
                </div>
                {{ Form::open(['method' => 'patch', 'route' => 'profile.changepassword']) }}
                    <div class="row element-information">
                        <div class="col-md-3">@lang('profile.old_password')</div>
                        <div class="col-md-9 show-detail-information">
                            {{ Form::password('oldpassword', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('profile.new_password')</div>
                        <div class="col-md-9 show-detail-information">
                            {{ Form::password('newpassword', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="row element-information">
                        <div class="col-md-3">@lang('profile.confirm_password')</div>
                        <div class="col-md-9 show-detail-information">
                            {{ Form::password('retypepassword', ['class' => 'form-control']) }}
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
