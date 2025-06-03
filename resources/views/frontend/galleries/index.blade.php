@extends('layouts.app')

@section('title', ('All Galleries - '.$seosetting->title))
@section('meta_keywords', $seosetting->keyword)
@section('meta_description', $seosetting->description)
@section('og_image', asset('storage/' . $seosetting->og_image))

@section('content')
<section id="subheader" class="relative jarallax text-light">
    <img src="https://bracketweb.com/villoz-html/assets/images/backgrounds/slider-1-3.jpg" class="jarallax-img w-100" alt="{{ $seosetting->title }}">
    <div class="container relative z-index-1000">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center py-5 py-lg-3">
                <h1 class="text-capitalize display-5">Galleries</h1>
                <ul class="crumb">
                    <li><a href="{{ url('/') }}">Homepage</a></li>
                    <li class="active">Galleries</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="de-gradient-edge-top dark"></div>
    <div class="de-overlay"></div>
</section>

            <section class="relative">
                <div class="container">
                    <div class="row g-4">
                        @foreach ($galleries as $gallery)
                        <div class="col-lg-4 text-center">
                            <a href="{{ asset('storage/' . $gallery->image_name) }}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div> 
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{ asset('storage/' . $gallery->image_name) }}" class="img-fluid card-post-image hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>
                        @endforeach
                                {{-- Pagination --}}
                        <div class="row mt-4">
                            <div class="col text-center">
                                {{ $galleries->links('layouts.pagination') }}
                            </div>
                        </div>


                    </div>
                </div>
            </section>

@endsection