<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta property="og:locale" content="id_ID">
    <meta property="og:locale:alternate" content="en_US">


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

    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/swiper.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/coloring.css') }}" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="{{ asset('assets/css/colors/main-color.css') }}" rel="stylesheet" type="text/css" >
    
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
<body>

<div id="wrapper">
    <a href="#" id="back-to-top"></a>

            <!-- preloader begin -->
        <div id="de-loader"></div>
        <!-- preloader end -->
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

</div>


<!-- Javascript Files
================================================== -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/designesia.js') }}"></script>
<script src="{{ asset('assets/js/swiper.js') }}"></script>
<script src="{{ asset('assets/js/custom-swiper-3.js') }}"></script>
<script src="{{ asset('assets/js/custom-marquee.js') }}"></script>

</body>
</html>
