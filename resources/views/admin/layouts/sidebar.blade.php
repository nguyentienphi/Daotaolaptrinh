<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
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
                </ul>
            </div>
        </nav>
    </div>
</div>
