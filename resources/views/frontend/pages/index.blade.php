@extends('layouts.app')

@section('title', ($page->title.' - '.$seosetting->title))
@section('meta_keywords', $page->keyword)
@section('meta_description', $page->description)
@section('og_image', asset('storage/' . $page->featured_image))

@section('content')
<section id="subheader" class="relative jarallax text-light">
    <img src="https://bracketweb.com/villoz-html/assets/images/backgrounds/slider-1-3.jpg" class="jarallax-img w-100" alt="{{ $seosetting->title }}">
    <div class="container relative z-index-1000">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center py-5 py-lg-3">
                <h1 class="text-capitalize display-5">{{ $page->title }}</h1>
                <ul class="crumb">
                    <li><a href="{{ url('/') }}">Homepage</a></li>
                    <li class="active">Pages</li>
                    <li class="active">{{ $page->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="de-gradient-edge-top dark"></div>
    <div class="de-overlay"></div>
</section>
{!! $page->content !!}
@endsection