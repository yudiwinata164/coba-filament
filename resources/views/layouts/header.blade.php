{{-- Field Menu --}}
@php
  $menus = [
    ['title' => __('homepage.homepage'), 'url' => url('/'), 'pattern' => '/'],
    ['title' => __('homepage.about_us'), 'url' => url('/about-us'), 'pattern' => 'about-us*'],
    ['title' => __('homepage.facilities'), 'url' => url('/facilities'), 'pattern' => 'facilities*'],
    ['title' => __('homepage.gallery'), 'url' => url('/galleries'), 'pattern' => 'galleries*'],
    ['title' => __('homepage.contact_us'), 'url' => url('/contact'), 'pattern' => 'contact*'],
  ];
@endphp

@php
    $lang = session('locale', 'en');
@endphp

    
    {{-- Header --}}
    <header class="transparent">
        <div class="container rounded-30px mt-3 py-2 my-md-0 ps-md-5 pe-md-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex sm-pt10">
                        <div class="de-flex-col">
                            <div id="logo">
                                <a href="{{ url('/') }}">
                                    <img class="logo-main" src="{{ asset('assets/images/logo-white.webp') }}" alt="Logo">
                                    <img class="logo-mobile" src="{{ asset('assets/images/logo-white.webp') }}" alt="Logo">
                                </a>
                            </div>
                        </div>

                        <div class="main-menu de-flex-col bg-blur rounded-pill ps-md-2 pe-md-2 header-col-mid">
                            <ul id="mainmenu">
                              @foreach ($menus as $menu)
                                <li><a class="menu-item {{ Request::is($menu['pattern']) ? 'active' : '' }}" href="{{ $menu['url'] }}">{{ $menu['title'] }}</a></li>
                              @endforeach
                                {{-- <div class="w-50">
                                    <div class="language-switch d-flex d-md-none">
                                        <a href="{{ route('lang.switch', 'en') }}" class="{{ $lang == 'en' ? 'active' : '' }}">
                                            <img src="{{ asset('assets/images/flag/uk-flag-round-circle-icon.svg') }}" alt="UK Flag">EN
                                        </a>
                                        <a href="{{ route('lang.switch', 'id') }}" class="{{ $lang == 'id' ? 'active' : '' }}">
                                            <img src="{{ asset('assets/images/flag/id-flag-round-circle-icon.svg') }}" alt="ID Flag">ID
                                        </a>
                                    </div>
                                </div> --}}
                            </ul>
                        </div>

                        <div class="de-flex-col">
                            <div class="menu_side_area d-flex justify-content-center align-item-center">
                                <div class="language-switch">
                                    <a href="{{ route('lang.switch', 'en') }}" class="{{ $lang == 'en' ? 'active' : '' }}">
                                        <img src="{{ asset('assets/images/flag/uk-flag-round-circle-icon.svg') }}" alt="UK Flag">EN
                                    </a>
                                    <a href="{{ route('lang.switch', 'id') }}" class="{{ $lang == 'id' ? 'active' : '' }}">
                                        <img src="{{ asset('assets/images/flag/id-flag-round-circle-icon.svg') }}" alt="ID Flag">ID 
                                    </a>
                                </div>
                                <div id="menu-btn">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>