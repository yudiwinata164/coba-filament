@extends('layouts.app')

@section('title', $seosetting->title)
@section('meta_keywords', $seosetting->keyword)
@section('meta_description', $seosetting->description)
@section('og_image', asset('storage/' . $seosetting->og_image))


@section('content')
<div class="hero-section d-flex align-items-center text-white">
  <div class="container">
    <h1 class="display-3 fw-bold text-center">Lorem Ipsum</h1>
      <p class="fs-4 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      <div class="d-flex justify-content-center">
        <div class="dropdown-center">
          <button class="btn btn-lg btn-outline-light rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Book Now
          </button>
          <ul class="dropdown-menu dropdown-menu-light mt-2 p-1 rounded-20">
            <li><a class="dropdown-item rounded-20" href="#">Booking at Booking.com</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item  rounded-20" href="#">Booking at Traveloka</a></li>
          </ul>
        </div>
      </div>
  </div>
</div>

<section class="wrapper content-py pt-5">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
        <h2 class="display-5 fw-bold">Welcome To Our <br><span class="text-primary">Lorem Ipsum</span></h2>
      </div>
      <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, eos cum maiores sint quisquam consectetur quam ipsum delectus unde dicta aliquid nemo inventore laborum ea. Repellendus molestiae reprehenderit adipisci sequi?</p>
      </div>
    </div>
  </div>
</section>

<section class="wrapper content-py">
  <div class="container">
    <div class="row">

      <div class="col-12 col-md-7">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <!-- <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div> -->
            
          <div class="carousel-inner">
            <div class="carousel-item carousel-item-6 active">
              <img src="https://bracketweb.com/villoz-html/assets/images/backgrounds/slider-2-3.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item carousel-item-6">
              <img src="https://bracketweb.com/villoz-html/assets/images/backgrounds/slider-1-3.jpg" class="d-block w-100" alt="Slide 2">
            </div>
          </div>
          <div class="carousel-caption d-flex align-items-start text-white">
            <div class="container">
              <h6 class="display-6 text-start fw-bold">Lorem Ipsum</h6>
              <p class="fs-6 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <div class="col-12 col-md-5 mt-3 mt-md-0">
        <div class="container bg-gray box-400 rounded-20 d-flex flex-column justify-content-center align-items-center text-center">
          <div class="container">
            <h4 class="fw-bold">Lorem Ipsum <br><span class="text-primary">Dolor Sit Amet</span></h4>
            <p class="fs-6">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt accusantium rem voluptates magni aspernatur rerum optio voluptas exercitationem itaque obcaecati, dolore quae libero esse velit at quod? Voluptas, officia eum?</p>
            <a href="#" class="btn btn-outline-dark rounded-pill btn-lg">Learn More</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="wrapper">
  <div class="content-py bg-gray">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-8 mb-3 text-center">
          <h2 class="fw-bold">Recent Posts</h2>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
        </div>
      </div>

      <div class="row justify-content-center g-3">

            @foreach ($posts as $post)
                <div class="col-12 col-md-3">
                    <a href="{{ url($post->url) }}">
                        <div class="card text-bg-dark custom-card">
                            @if ($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img h-100" alt="{{ $post->title }}" loading="lazy">
                            @endif
                            <div class="card-img-overlay">
                                <p class="card-text btn btn-primary rounded-0 btn-sm">{{ $post->category->category }}</p>
                                <h3 class="cart-title text-capitalize">{{ $post->title }}</h3>
                                <p class="card-text">{{ $post->created_at->format('m/d/Y') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            <div class="col-12 mt-4 d-flex justify-content-end">
              <a href="{{ url('/posts') }}" class="btn text-end btn-primary">
                View All Posts
              </a>
            </div>

      </div>

    </div>
  </div>
</section>
@endsection