@php
  $menus = [
    ['title' => 'Homepage', 'url' => url('/'), 'pattern' => '/'],
    // ['title' => 'Rooms & Villa', 'url' => url('/room-villa'), 'pattern' => 'room-villa*'],
    ['title' => 'About Us', 'url' => url('/about-us'), 'pattern' => 'about-us*'],
    ['title' => 'Fasilities', 'url' => url('/facilities'), 'pattern' => 'facilities*'],
    ['title' => 'Gallery', 'url' => url('/gallery'), 'pattern' => 'gallery*'],
    ['title' => 'Contact Us', 'url' => url('/contact'), 'pattern' => 'contact*'],
  ];
@endphp

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-uppercase text-white" href="{{ url('/') }}">Lorem Ipsum</a>
    <a class="navbar-toggler ms-auto text-white" href="#" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto text-center">

        @foreach ($menus as $menu)
          <li class="nav-item">
            <a class="nav-link {{ Request::is($menu['pattern']) ? 'active' : '' }}" href="{{ $menu['url'] }}">
              {{ $menu['title'] }}
            </a>
          </li>
        @endforeach

        <li class="nav-item d-lg-none">
        <div class="dropdown">
          <button class="btn btn-lg btn-outline-light rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Book Now
          </button>
          <ul class="dropdown-menu dropdown-menu-light mt-3 p-1 rounded-20">
            <li><a class="dropdown-item rounded-20" href="#">Action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item  rounded-20" href="#">Another action</a></li>
          </ul>
        </div>
        </li>
      </ul>
    </div>

    <div class="dropdown">
      <button class="btn btn-lg btn-outline-light rounded-pill d-none d-lg-block dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Book Now
      </button>
      <ul class="dropdown-menu dropdown-menu-light mt-3 p-1 rounded-20">
        <li><a class="dropdown-item rounded-20" href="#">Action</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item  rounded-20" href="#">Another action</a></li>
      </ul>
    </div>
    <!-- <a class="btn btn-lg btn-outline-light rounded-pill d-none d-lg-block" href="#">Book Now</a> -->
  </div>
</nav>
