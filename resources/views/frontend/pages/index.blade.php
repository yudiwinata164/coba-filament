@extends('layouts.app')

@section('title', ($page->title.' - '.$seosetting->title))
@section('meta_keywords', $page->keyword)
@section('meta_description', $page->description)
@section('og_image', asset('storage/' . $page->featured_image))

@section('content')
    <!-- Hero Section -->
<div class="page-hero-section d-flex align-items-center text-white">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 mt-5">
                <h1 class="display-3 fw-bold text-center">{{ $page->title }}</h1>
                <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                    <ol class="breadcrumb d-flex justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white underline-none">Homepage</a></li>
                      <li class="breadcrumb-item text-white" aria-current="page">Pages</li>
                      <li class="breadcrumb-item text-white" aria-current="page">{{ $page->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
{!! $page->content !!}
@endsection