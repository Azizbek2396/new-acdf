<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('programs.index') }}"><i class="fa fa-book" aria-hidden="true"></i> Программы</a>
            </li>
            <li>
                <a href="{{ route('pages.index') }}"><i class="fa fa-file-text" aria-hidden="true"></i> Страницы</a>
            </li>
{{--            <?php /*--}}
{{--            <li>--}}
{{--                <a href="{{ route('publications.index') }}"><i class="fa fa-table fa-fw"></i> О нас пишут</a>--}}
{{--            </li>--}}
{{--            */ ?>--}}
{{--<!--            --><?php ///*--}}
{{--//            <li>--}}
{{--//                <a href="#"><i class="fa fa-table fa-fw"></i> Новости<span class="fa arrow"></span></a>--}}
{{--//                <ul class="nav nav-second-level">--}}
{{--//                    <li>--}}
{{--//                        <a href="{{ route('news.index') }}">Новости</a>--}}
{{--//                    </li>--}}
{{--//                    <li>--}}
{{--//                        <a href="{{ route('news-subjects.index') }}">Темы</a>--}}
{{--//                    </li>--}}
{{--//                </ul>--}}
{{--//            </li>--}}
{{--//            */ ?>--}}
            <li>
                <a href="{{ route('news.index') }}"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Новости</a>
            </li>
            <li>
                <a href="{{ route('albums.index') }}"><i class="fa fa-picture-o" aria-hidden="true"></i> Фотогалерея</a>
            </li>
            <li>
                <a href="{{ route('videos.index') }}"><i class="fa fa-video-camera" aria-hidden="true"></i> Видеогалерея</a>
            </li>
            <li>
                <a href="{{ route('mainbanners.index') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i> Баннеры</a>
            </li>
{{--            <?php /* ?>--}}
{{--            <li>--}}
{{--                <a href="{{ route('employees.index') }}"><i class="fa fa-table fa-fw"></i> Руководство</a>--}}
{{--            </li>--}}
{{--            <?php */ ?>--}}
            <li>
                <a href="{{ route('social-networks.index') }}"><i  class="fa fa-heart" aria-hidden="true"></i> Социальные сети</a>
            </li>
            <li>
                <a href="{{ route('menu.index') }}"><i class="fa fa-bars" aria-hidden="true"></i> Меню</a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa fa-users fa-fw">

                    </i>
                    User management
                </a>
                <ul class="nav-dropdown-items user-dropdawn">
                    <li class="nav-item">
                        <a href="{{ route("permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fa fas fa-unlock-alt fa-fw">

                            </i>
                            Разрешение
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fa fa-fw fas fa-briefcase">

                            </i>
                            Роли
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fa fa-user fa-fw">

                            </i>
                            Пользователи
                        </a>
                    </li>
                </ul>
            </li>

{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    User management--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('users.index') }}" class="dropdown-item"><i class="fa fa-users fa-fw"></i> Пользователи</a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ route('roles.index') }}" class="dropdown-item"><i class="fa fa-fw fas fa-briefcase"></i> Роли</a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ route('permissions.index') }}" class="dropdown-item"><i class="fa fas fa-unlock-alt fa-fw"></i>Разрешение</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}

{{--            </li>--}}
{{--            @role('admin')--}}
{{--                <?php ?>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('users.index') }}"><i class="fa fa-users fa-fw"></i> Пользователи</a>--}}
{{--                    </li>--}}
{{--                            <?php if (isset($_GET['dev'])): ?>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('roles.index') }}"><i class="fa fa-fw fas fa-briefcase"></i> Роли</a>--}}
{{--                    </li>--}}
{{--                        <?php endif ?>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('permissions.index') }}"><i class="fa fas fa-unlock-alt fa-fw"></i>Разрешение</a>--}}
{{--                    </li>--}}
{{--                 <?php ?>--}}
{{--            @endrole--}}
            <li>
                <a href="{{ route('options.index') }}"><i class="fa fa-table fa-fw"></i> Контакты</a>
            </li>
            <li>
                <a href="{{ route('textblocks.index') }}"><i class="fa fa-text-width" aria-hidden="true"></i> Текстовые блоки</a>
            </li>
            <li>
                <a href="{{ route('blocks.index') }}"><i class="fa fa-th-large" aria-hidden="true"></i> Блоки</a>
            </li>
{{--            <?php /*--}}
{{--            <li>--}}
{{--                <a href="{{ route('dispatch') }}"><i class="fa fa-table fa-fw"></i> Рассылка</a>--}}
{{--            </li>--}}
{{--            */ ?>--}}
        </ul>
    </div>
</div>
