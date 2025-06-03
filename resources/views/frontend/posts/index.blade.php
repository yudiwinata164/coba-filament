@extends('layouts.app')

@section('title', ('All Posts - '.$seosetting->title))
@section('meta_keywords', $seosetting->keyword)
@section('meta_description', $seosetting->description)
@section('og_image', asset('storage/' . $seosetting->og_image))

@section('content')
<section id="subheader" class="relative jarallax text-light">
    <img src="https://bracketweb.com/villoz-html/assets/images/backgrounds/slider-1-3.jpg" class="jarallax-img w-100" alt="{{ $seosetting->title }}">
    <div class="container relative z-index-1000">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center py-5 py-lg-3">
                <h1 class="text-capitalize display-5">{{ __('homepage.all_post') }}</h1>
                <ul class="crumb">
                    <li><a href="{{ url('/') }}">Homepage</a></li>
                    <li class="active">Posts</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="de-gradient-edge-top dark"></div>
    <div class="de-overlay"></div>
</section>

<section class="px-4 pt-md-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="row g-4">

                  @foreach ($posts as $post)
                  <div class="{{ $loop->first ? 'col-md-8' : 'col-md-4' }}">
                      <div class="hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".3s">
                          <a href="{{ url($post->url) }}" class="abs w-100 h-100 z-5"></a>
                          @if ($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" class="hover-scale-1-1 card-post-image w-100 h-100 object-fit-cover" alt="{{ $post->title }}" loading="lazy">
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
                    <div class="row mt-4">
                        <div class="col text-center">
                            {{ $posts->links('layouts.pagination') }}
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-3">
                @include('layouts.widget')
            </div>
        </div>

    </div>
</section>

@endsection
