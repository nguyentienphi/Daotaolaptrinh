<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu - <span style="color: red">{{ auth()->user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse"
                           aria-expanded="{{ isset($activeMenu) ? (($activeMenu['menu'] == 'users') ? 'true' : '') : ''}}"
                           data-target="#submenu-2" aria-controls="submenu-2"><i
                                class="fa fa-fw fa-rocket"></i>{{ trans('siderbar.user.title') }}</a>
                        <div id="submenu-2"
                             class="collapse submenu {{ isset($activeMenu) ? (($activeMenu['menu'] == 'users') ? 'show' : '') : ''}}">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ isset($activeMenu) ? (($activeMenu['item'] == 'add_user') ? 'active' : '' ): '' }}"
                                       href="{{ route('admin.users.add') }}">{{ trans('siderbar.user.add') }}<span
                                            class="badge badge-secondary"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ isset($activeMenu) ? (($activeMenu['item'] == 'list_user') ? 'active' : '' ): '' }}"
                                       href="{{ route('admin.users.index') }}">{{ trans('siderbar.user.list') }}<span
                                            class="badge badge-secondary"></span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse"
                           aria-expanded="{{ isset($activeMenu) ? (($activeMenu['menu'] == 'courses') ? 'true' : '') : ''}}"
                           data-target="#submenu-3" aria-controls="submenu-3"><i
                                class="fa fa-fw fa-rocket"></i>{{ trans('siderbar.courses.title') }}</a>
                        <div id="submenu-3"
                             class="collapse submenu {{ isset($activeMenu) ? (($activeMenu['menu'] == 'courses') ? 'show' : '') : ''}}">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ isset($activeMenu) ? (($activeMenu['item'] == 'add_course') ? 'active' : '') : '' }}"
                                       href="{{ route('admin.courses.create') }}">{{ trans('siderbar.courses.add') }}<span
                                            class="badge badge-secondary"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ isset($activeMenu) ? (($activeMenu['item'] == 'list_course') ? 'active' : '') : '' }}"
                                       href="{{ route('admin.courses.index') }}">{{ trans('siderbar.courses.list') }}
                                        <span class="badge badge-secondary"></span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse"
                           aria-expanded="{{ isset($activeMenu) ? (($activeMenu['menu'] == 'posts') ? 'true' : '') : ''}}"
                           data-target="#submenu-4" aria-controls="submenu-4"><i
                                class="fa fa-fw fa-rocket"></i>{{ trans('siderbar.posts.title') }}</a>
                        <div id="submenu-4"
                             class="collapse submenu {{ isset($activeMenu) ? (($activeMenu['menu'] == 'posts') ? 'show' : '') : ''}}">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ isset($activeMenu) ? (($activeMenu['item'] == 'add_post') ? 'active' : '') : '' }}"
                                       href="{{ route('admin.posts.create') }}">{{ trans('siderbar.posts.add') }}<span
                                            class="badge badge-secondary"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ isset($activeMenu) ? (($activeMenu['item'] == 'list_post') ? 'active' : '') : '' }}"
                                       href="{{ route('admin.posts.index') }}">{{ trans('siderbar.posts.list') }}
                                        <span class="badge badge-secondary"></span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse"
                           aria-expanded="{{ isset($activeMenu) ? (($activeMenu['menu'] == 'comments') ? 'true' : '') : ''}}"
                           data-target="#submenu-5" aria-controls="submenu-5"><i
                                class="fa fa-fw fa-rocket"></i>{{ trans('siderbar.comments.title') }}</a>
                        <div id="submenu-5"
                             class="collapse submenu {{ isset($activeMenu) ? (($activeMenu['menu'] == 'comments') ? 'show' : '') : ''}}">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ isset($activeMenu) ? (($activeMenu['item'] == 'list_comment') ? 'active' : '') : '' }}"
                                       href="{{ route('admin.comments.index') }}">{{ trans('siderbar.comments.list') }}
                                        <span class="badge badge-secondary"></span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse"
                           aria-expanded="{{ isset($activeMenu) ? (($activeMenu['menu'] == 'categories') ? 'true' : '') : ''}}"
                           data-target="#submenu-6" aria-controls="submenu-6"><i
                                class="fa fa-fw fa-rocket"></i>{{ trans('siderbar.categories.title') }}</a>
                        <div id="submenu-6"
                             class="collapse submenu {{ isset($activeMenu) ? (($activeMenu['menu'] == 'categories') ? 'show' : '') : ''}}">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ isset($activeMenu) ? (($activeMenu['item'] == 'add_category') ? 'active' : '') : '' }}"
                                       href="{{ route('admin.categories.create') }}">{{ trans('siderbar.categories.add') }}<span
                                            class="badge badge-secondary"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ isset($activeMenu) ? (($activeMenu['item'] == 'list_category') ? 'active' : '') : '' }}"
                                       href="{{ route('admin.categories.index') }}">{{ trans('siderbar.categories.list') }}
                                        <span class="badge badge-secondary"></span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}"><i class="fa fa-fw fa-rocket"></i>Đăng Xuất</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
