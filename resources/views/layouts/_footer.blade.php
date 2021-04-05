<section id="contacts" class="black">
    <div class="wrapper pb-5 pt-5" id="wrapper-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12 m-t-30 mb-3">
                    <h2 class="text-uppercase">{{ __('main.contacts') }}</h2>
                </div>
                <div class="col-xl-4 col-lg-6 m-t-30">
                    <p class="mb-lg-5">{{ __('main.acdf_label') }}</p>
                    <p>{!! isset($contacts['address']) ? $contacts['address'] : "" !!}</p>
                </div>
                <div class="col-xl-4 col-lg-6 m-t-30">
                    <p>{{ __('main.phone') }}:
                        <a href="tel:{{ isset($contacts['telNumber']) ? $contacts['telNumber'] : '' }}" class="text-decoration-none underline">
                            {{ isset($contacts['telNumber']) ? $contacts['telNumber'] : "" }}
                        </a>
                    </p>
                    <p>Email:
                        <a href="mailto:{{ isset($contacts['adminEmail']) ? $contacts['adminEmail'] : '' }}" class="text-decoration-none underline">
                            {{ isset($contacts['adminEmail']) ? $contacts['adminEmail'] : "" }}
                        </a>
                    </p>
                    <p>{{__('main.social_media')}}<br></p>

{{--                    <?php $social_network = App\Repositories\SocialNetworksRepository::getAllForSite(); ?>--}}
{{--                    @if ($social_network)--}}
{{--                        <div class="social-wrap">--}}
{{--                            @foreach ($social_network as $sn)--}}
{{--                                <a href="{{ $sn->url }}" title='{{ $sn->title }}'--}}
{{--                                   class='social-link fa-stack fa-lg transition-025s'>--}}
{{--                                    <i class="fa fa-circle fa-stack-2x"></i>--}}
{{--                                    <i class="fa fa-stack-1x fa-black fa-{{ strtolower($sn->title) == 'telegram' ? 'paper-plane' : strtolower($sn->title) }}"--}}
{{--                                       aria-hidden="true"></i>--}}
{{--                                </a>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>
    @if (isset($footer_menu))
        <div class="menu-wrap black-darken pb-5 pt-5 d-none d-md-block">
            <div class="container">
                <div class="row">
                    @foreach ($footer_menu as $menu)
                        <div class="col-lg-3 col-md-6">
                            <h6><a class="light" href="{{ $menu['item']->url }}">{{ $menu['item']->title }}</a></h6>
                            <?= generateMenu($menu['childrens'], 'f-menu') ?>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="copyright-wrap pb-2 pt-2 black-darken">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 m-t-30 text-center">
                    <p class="mt-2 mb-2"><small><i class="fa fa-copyright"></i>  2017 - {{ date("Y") }} {{ __('main.acdf_label') }}.</small></p>
                </div>
            </div>
        </div>
    </div>
</section>
