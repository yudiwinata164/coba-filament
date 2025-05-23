@extends('layouts.app')

@section('title', ('All Posts - '.$seosetting->title))
@section('meta_keywords', $seosetting->keyword)
@section('meta_description', $seosetting->description)
@section('og_image', asset('storage/' . $seosetting->og_image))

@section('content')
<div class="page-hero-section d-flex align-items-center text-white">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <h1 class="display-3 fw-bold text-center">All Posts</h1>
                <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                    <ol class="breadcrumb d-flex justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white underline-none">Homepage</a></li>
                      <li class="breadcrumb-item text-white" aria-current="page">Post</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="wrapper container">
    <div class="row">
        <div class="col-12 col-md-9">
            <section class="wrapper">
                <div class="content-py">
                  <div class="">
              
                    <div class="row g-3">

                    @foreach ($posts as $post)
                        <div class="col-12 {{ $loop->first ? 'col-md-8' : 'col-md-4' }}">
                            <a href="{{ url($post->url) }}">
                                <div class="card text-bg-dark custom-card">
                                    @if ($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img h-100" alt="{{ $post->title }}" loading="lazy">
                                    @endif
                                    <div class="card-img-overlay">
                                        <p class="card-text btn btn-primary rounded-0 btn-sm">{{ $post->category->category }}</p>
                                        <h3 class="cart-title text-capitalize">{{ $post->title}}</h3>
                                        <p class="card-text">{{ $post->created_at->format('m/d/Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
              
                    </div>
              
                  </div>
                </div>
              </section>
        </div>

        <div class="col-12 col-md-3">
            
        </div>

    </div>
</section>



{{-- <div class="container mt-4">
    <h1>All Posts</h1>
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if ($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p><small>Keywords: {{ $post->keyword }}</small></p>
                    <a href="{{ url($post->url) }}" class="btn btn-primary mt-auto">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> --}}
@endsection
