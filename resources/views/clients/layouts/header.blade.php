<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
    <head>
        <meta charset="utf-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="{{ asset('storage/image/elements/college-graduation.png') }}" type="image/png" />
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/clients/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/clients/flaticon.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/clients/themify-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/clients/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/clients/nice-select.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/clients/style.css')}}" />
    </head>
    <body>
        <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"aria-label="Toggle navigation" >
                            <span class="icon-bar"></span> <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}">@lang('lang.home')</a>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">@lang('lang.post')</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($categories as $category)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('list-post-category', $category->id) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">@lang('lang.video')</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($categories as $category)
                                            <li class="nav-item">
                                                <a class="nav-link" href="">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">@lang('lang.course')</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($categories as $category)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('list-course-category', $category->id) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">@lang('lang.help')</a>
                                </li>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLogin">@lang('lang.login')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#modalRegister">@lang('lang.register')</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('post.create') }}">@lang('lang.create_post')</a>
                                    </li>
                                    <li class="nav-item user-dropdown last show">
                                        <a class="nav-link dropdown-toggle user-nav-show" href="javascript:void(0)" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <span class="user-profile">
                                                {{ Html::image(asset(Auth::user()->avatar), '', ['class' => 'user-imgaes']) }}
                                                <span class="user-name d-none-992">
                                                    {{Auth::user()->name}}
                                                </span>
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right header-menu show-box-user" aria-labelledby="navbarDropdownProfile">
                                            <li>
                                                <a href="">@lang('lang.profile')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('list-post-user') }}">@lang('lang.list_post')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('lang.add_coin')</a>
                                            </li>
                                            <li>
                                                <a href="">@lang('lang.comment')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}">@lang('lang.logout')</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endguest
                          </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
