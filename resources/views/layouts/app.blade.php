<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="description" content="@yield('meta_description')" />

    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="@yield('og_image')">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@yudiwinata">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('meta_description')">
    <meta name="twitter:image" content="@yield('og_image')">

    <meta name="robots" content="index, follow">
    
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="@yield('title')">
    <link rel="canonical" href="{{ url('/') }}">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/custom/style.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "Website",
        "name": "@yield('title')",
        "url": "{{ url()->current() }}",
        "description": "@yield('meta_description')"
        }
    </script>

</head>
<body  class="inria-serif-regular">

@include('layouts.header')

@yield('content')

@include('layouts.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
