@extends('layouts.app')

@section('title', ($post->title.' - '.$seosetting->title))
@section('meta_keywords', $post->keyword)
@section('meta_description', $post->description)
@section('og_image', asset('storage/' . $post->featured_image))

@section('content')


<!-- Hero Section -->
<div class="page-hero-section d-flex align-items-center text-white">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 mt-5">
                <h1 class="display-5 fw-bold text-center">{{ $post->title }}</h1>
                <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                    <ol class="breadcrumb d-flex justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white underline-none">Homepage</a></li>
                      <li class="breadcrumb-item text-white" aria-current="page">Posts</li>
                      <li class="breadcrumb-item text-white" aria-current="page">{{ $post->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="wrapper container">
    <div class="row">
        <!-- Konten Utama -->
        <div class="col-12 col-md-9">
            <section class="wrapper">
                <div class="content-py">
                    <div class="row g-3">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img h-100" alt="{{ $post->title }}" loading="lazy">
                        <h2>{{ $post->title }}</h2>
                        <p><strong>Kategori:</strong> {{ $post->category->category }}</p>

                        <!-- Table of Contents -->
                        <div id="table-of-contents" class="mb-4 p-3 border rounded bg-light">
                            <h4>Table of Content</h4>
                            <ul id="toc-list" class="list-unstyled ps-3"></ul>
                        </div>

                        <div class="content" id="post-content">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Sidebar -->
        <div class="col-12 col-md-3">

        </div>
    </div>
</section>


<script>
document.addEventListener("DOMContentLoaded", function() {
    let tocList = document.getElementById("toc-list");
    let content = document.getElementById("post-content");
    let headers = content.querySelectorAll("h2, h3, h4");

    if (headers.length === 0) {
        document.getElementById("table-of-contents").style.display = "none";
        return;
    }

    headers.forEach((header, index) => {
        let anchor = "section-" + index;
        header.id = anchor;
        let li = document.createElement("li");
        li.innerHTML = `<a href="#${anchor}" class="text-decoration-none">${header.innerText}</a>`;
        tocList.appendChild(li);
    });
});
</script>






{{-- <div class="container mt-4">
    <article>
        <h1>{{ $post->title }}</h1>
        @if ($post->featured_image)
            <img src="{{ asset('storage/posts/' . $post->featured_image) }}" alt="{{ $post->title }}" class="img-fluid mb-3" />
        @endif
        <div>{!! $post->content !!}</div>
    </article>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-4">Back to Posts</a>
</div> --}}
@endsection
