<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
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
                <div class="search_input" id="search_input_box">
                    <div class="container">
                        <form class="d-flex justify-content-between" method="" action="">
                            <input type="text" class="form-control" id="search_input"
                            placeholder="Search here"/>
                          <button type="submit" class="btn"></button>
                          <span class="ti-close" id="close_search" title="Close Search"></span>
                        </form>
                    </div>
                </div>
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
                                    <a class="nav-link" href="index.html">@lang('lang.home')</a>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">@lang('lang.post')</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="courses.html">Git</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="course-details.html">PHP</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="elements.html">Java</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">@lang('lang.video')</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="courses.html">Git</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="course-details.html">PHP</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="elements.html">Java</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">@lang('lang.course')</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="courses.html">Git</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="course-details.html">PHP</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="elements.html">Java</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">@lang('lang.help')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLogin">@lang('lang.login')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalRegister">@lang('lang.register')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link search" id="search">
                                        <i class="ti-search"></i>
                                    </a>
                                </li>
                          </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
