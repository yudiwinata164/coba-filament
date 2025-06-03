@extends('layouts.app')

@section('title', $seosetting->title)
@section('meta_keywords', $seosetting->keyword)
@section('meta_description', $seosetting->description)
@section('og_image', asset('storage/' . $seosetting->og_image))

@php
  // Slider
  $sliderimages = [
    ['image_url' => 'https://bracketweb.com/villoz-html/assets/images/backgrounds/slider-1-3.jpg'],
    // ['image_url' => 'http://127.0.0.1:8000/storage/posts/IMG_6220-1.jpg'],
  ];
  // endSlider

  // Carousel
  $slidercarouselfirst = [
    ['image_url' => 'https://bracketweb.com/villoz-html/assets/images/backgrounds/slider-2-3.jpg', 'alt' => 'Slider 1'],
  ];
  $slidercarousels = [
    ['image_url' => 'https://bracketweb.com/villoz-html/assets/images/backgrounds/slider-1-3.jpg', 'alt' => 'Slider 2'],
  ];
  // endCarousel

@endphp


@section('content')

        {{-- content begin --}}
        <div class="no-bottom no-top" id="content">

            <div id="top"></div>

            <section class="text-light no-top no-bottom relative overflow-hidden z-1000">
                <div class="h-30 de-gradient-edge-top op-5 dark z-2"></div>
                <img src="file:///D:/Gardyn%20HTML/images/logo-wm.webp" class="abs end-0 bottom-0 z-2 w-20" alt="">
                <div class="v-center relative">

                    <div class="abs abs-centered z-1000 w-100">
                        <div class="container mt-md-5">
                            <div class="row g-4 justify-content-center text-center align-items-center">
                                <div class="col-lg-7">
                                    <h1 class="text-uppercase display-5 wow fadeInUp" data-wow-delay=".3s">{{ __('homepage.h1_hero') }}</h1>
                                    <p class="wow fadeInUp text-capitalize" data-wow-delay=".6s">{{ __('homepage.description_hero') }}</p>
                                    <button class="dropdown-toggle btn-main fw-normal btn-md wow fadeInDown" data-wow-delay=".9s" type="button" data-bs-toggle="dropdown" aria-expanded="false">Book Now</button>
                                    <ul class="dropdown-menu bg-white rounded-md my-2">
                                      <li><a class="dropdown-item text-dark" href="#">Booking at Traveloka</a></li>
                                      <li><a class="dropdown-item text-dark" href="#">Booking at Agoda</a></li>
                                    </ul>
                                    <div class="spacer-single"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper start-swiper">
                      {{-- Additional required wrapper --}}
                      <div class="swiper-wrapper">

                        {{-- Slides --}}
                        @foreach ($sliderimages as $sliderimage)
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url({{ $sliderimage['image_url'] }})">
                                <div class="sw-overlay op-2"></div>
                            </div>
                        </div>
                        @endforeach                
                        {{-- endSlides --}}

                      </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- content end -->

        <section class="bg-white pt-md-5">
            <div class="container py-md-5">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="col-md-9">
                            <h2 class="display-5 wow fadeInUp" data-wow-delay=".4s">{!! __('homepage.welcome_title') !!}</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="wow fadeInUp" data-wow-delay=".6s">{{ __('homepage.welcome_description') }}</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
            
                            <div class="carousel-inner rounded-30px wow fadeInLeft" data-wow-delay=".5s">
                              <div class="carousel-item carousel-item-6 active">
                                  <img src="{{ $slidercarouselfirst[0]['image_url'] }}" class="d-block w-100" alt="{{ $slidercarouselfirst[0]['alt'] }}">
                              </div>
                              @foreach ($slidercarousels as $slidercarousel)
                                <div class="carousel-item carousel-item-6">
                                    <img src="{{ $slidercarousel['image_url'] }}" class="d-block w-100" alt="{{ $slidercarousel['alt'] }}">
                                </div>
                              @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-3 my-3">
                            <div class="subtitle text-capitalize fw-normal id-color wow fadeInUp" data-wow-delay=".2s">Welcome to Gardyn</div>
                            <h2 class="display-5 wow fadeInUp" data-wow-delay=".4s">{!! __('homepage.about_title') !!}</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">{{ __('homepage.about_description') }}</p>
                            <a class="btn-main wow fadeInUp text-capitalize fw-normal" href="services.html" data-wow-delay=".6s">More About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- marquee section begin --}}
        <div class="pb-1 bg-light">
            <div class="wow fadeInRight d-flex">
                <div class="de-marquee-list pt-2 relative wow">
                  @foreach (__('homepage.marquees') as $marquee)
                    <span class="fs-20 lh-1 mx-4 text-uppercase title-font">{{ $marquee['title'] }}</span>
                  @endforeach
                </div>
            </div>
        </div>
        {{-- marquee section end --}}

        {{-- marquee section begin --}}
        <section class="pt-2 pb-1 bg-color mb60">
            <div class="wow fadeInLeft d-flex">
                <div class="de-marquee-list-2 relative wow">
                  @foreach (__('homepage.marquees') as $marquee)
                    <span class="fs-20 lh-1 mx-4 text-light text-uppercase title-font">{{ $marquee['title'] }}</span>
                  @endforeach
                </div>
            </div>
        </section>   
        {{-- marquee section end --}}


        <section class="px-4 pt-md-5">
            <div class="container-fluid">
                <div class="row g-4 align-items-center justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="subtitle text-capitalize wow fadeInUp">Our Works</div>
                        <h2 class="text-capitalize display-5 mb-4 wow fadeInUp" data-wow-delay=".2s">Recent <span class="id-color-2">Posts</span></h2>
                    </div>                        
                </div>

                <div class="row g-4 justify-content-center">
                  @foreach ($posts->take(3) as $post)
                  <div class="col-lg-4">
                      <div class="hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".3s">
                          <a href="{{ url($post->url) }}" class="abs w-100 h-100 z-5"></a>
                          @if ($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" class="hover-scale-1-1 card-post-image" alt="{{ $post->title }}" loading="lazy">
                          @endif
                          <div class="abs z-2 bottom-0 w-100">
                              <div class="p-3 rounded-1 justify-content-between align-items-center">
                                  <div class="">
                                      <div class="post-subtitle-card text-capitalize fw-normal my-1 bg-primary wow fadeInUp">{{ $post->category->category }}</div>
                                      <h4 class="post-title-card fw-500 my-2">{{ $post->title }}</h4>
                                      <p class="post-date-card my-1">{{ $post->created_at->format('M d, Y') }}</p>
                                  </div>
                              </div>
                          </div>
                          <div class="gradient-trans-dark-bottom abs w-100 h-40 bottom-0"></div>
                      </div>
                  </div>
                  @endforeach

                  <div class="col-lg-12 text-center">
                      <a class="btn-main fw-normal text-capitalize wow fadeInUp" href="{{ url('/posts') }}">View All Posts</a>
                  </div>

                </div>
            </div>
        </section>
@endsection