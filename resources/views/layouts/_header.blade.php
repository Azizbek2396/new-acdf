<header class="header not-display-m text-color-1">
    <article class="container">
        <div class="top-header">
            <div class="logo logo-wrap">
                <a href="{{ route('home') }}"><img src="{{ asset('/acdf/img/white_'.\App::getLocale().'.png') }}"></a>
            </div>
            <div class="top-menu" style="display: inline-block;">
                <ul>
{{--                    @if (isset($header_menu))--}}
{{--                        @foreach ($header_menu as $menu)--}}
{{--                            <li>--}}
{{--                                <a class="{{ ($sub = generateMenu($menu['childrens'], 'sub-menu animated fadeIn')) ? 'sub' : '' }}"--}}
{{--                                   href="{{ $menu['item']->url }}">--}}
{{--                                    {{ $menu['item']->title }}--}}
{{--                                </a>--}}
{{--                                <?= $sub ?>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
                </ul>
            </div>
            <ul class="lang">
{{--                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                    <li>--}}
{{--                        <a rel="alternate" hreflang="{{ $localeCode }}"--}}
{{--                           class="{{ $localeCode == \App::getLocale() ? 'active': '' }}"--}}
{{--                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                            {{ $properties['label'] }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
            </ul>
            <div class="clearfix"></div>
        </div>
        </div>
    </article>
</header>
<header class="mobile-header section not-display-d text-color-1">
    <article class="container">
        <div class="row">
            <div class="top-header">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img style="height: 60px;" src="{{ asset('/acdf/img/white_'.\App::getLocale().'.png') }}">
                    </a>
                    <div id="mobile-burger">
                        <img src="/acdf/img/mobile-burger.png">
                    </div>
                    <div id="mobile-close" style="display: none">
                        <img src="/acdf/img/mobile-close.png">
                    </div>
                </div>
            </div>
            <div id="mmenu-block" style="display: none;"></div>
            <div class="m-bottom-header">
                <div class="mmenu-lang-wrap">
                    <nav>
                        <ul class="mmenu-lang">
{{--                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                                <li <?= $localeCode == \App::getLocale() ? "class='active'" : ''; ?> >--}}
{{--                                    <a rel="alternate" hreflang="{{ $localeCode }}"--}}
{{--                                       class="text-overflow-ellipsis"--}}
{{--                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                                        {{ $properties['native'] }}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
                        </ul>
                    </nav>
                </div>
{{--                @if (isset($header_menu))--}}
{{--                    <?= generateMenuMobile($header_menu) ?>--}}
{{--                @endif--}}
            </div>
        </div>
    </article>
</header>
