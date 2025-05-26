{{-- Field Menu --}}
@php
  $menus = [
    ['title' => 'Homepage', 'url' => url('/'), 'pattern' => '/'],
    // ['title' => 'Rooms & Villa', 'url' => url('/room-villa'), 'pattern' => 'room-villa*'],
    ['title' => 'About Us', 'url' => url('/about-us'), 'pattern' => 'about-us*'],
    ['title' => 'Fasilities', 'url' => url('/facilities'), 'pattern' => 'facilities*'],
    ['title' => 'Gallery', 'url' => url('/galleries'), 'pattern' => 'galleries*'],
    ['title' => 'Contact Us', 'url' => url('/contact'), 'pattern' => 'contact*'],
  ];
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
                            </ul>
                        </div>

                        <div class="de-flex-col">
                            <div class="menu_side_area">
                                <a href="#" class="btn-main btn-line">Book Now</a>
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