@extends('layouts.app')

@section('title', ($post->title.' - '.$seosetting->title))
@section('meta_keywords', $post->keyword)
@section('meta_description', $post->description)
@section('og_image', asset('storage/' . $post->featured_image))

@section('content')

<section id="subheader" class="relative jarallax text-light">
    <img src="https://bracketweb.com/villoz-html/assets/images/backgrounds/slider-1-3.jpg" class="jarallax-img w-100" alt="{{ $seosetting->title }}">
    <div class="container relative z-index-1000">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h1 class="text-capitalize display-5">{{ $post->title }}</h1>
                <ul class="crumb">
                    <li><a href="{{ url('/') }}">Homepage</a></li>
                    <li class="active">Posts</li>
                    <li class="active">{{ $post->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="de-gradient-edge-top dark"></div>
    <div class="de-overlay"></div>
</section>

<section>
    <div class="container-fluid p-2 p-md-4">
        <div class="row gx-5">
            <div class="col-12 col-md-9">
                <div class="blog-read bg-white p-3 p-md-4 rounded-1">

                    <div class="post-text">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-100 rounded-1" alt="{{ $post->title }}" loading="lazy">
                        <div class="subtitle mt-3 mb-1 fw-normal text-capitalize">{{ $post->category->category }}</div>
                        <h2 class="fw-bold">{{ $post->title }}</h2>

                        <!-- Table of Contents -->
                        <div id="table-of-contents" class="mb-4 p-3 rounded-1 bg-light">
                            <h4>Table of Content</h4>
                            <ul id="toc-list" class="list-unstyled ps-3"></ul>
                        </div>

                        <div id="post-content">

                            {!! $post->content !!}
                        </div>

                    </div>
                </div>

                <div class="spacer-single"></div>
            </div>
            <div class="col-12 col-md-3">
                 @include('layouts.widget')
            </div>
        </div>
    </div>
</section>
@endsection
