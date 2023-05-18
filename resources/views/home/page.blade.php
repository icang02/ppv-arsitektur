@extends('layouts.home')

@section('main-contents')
    <style>
        body {
            background-color: #EFEFEF
        }
    </style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight" style="opacity: 0">Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0" style="opacity: 0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </div>


    <!-- Page Header End -->

    <div class="container p-5 bg-white shadow-lg">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">{{ Str::ucfirst($menu->kategory) }}</p>
            <h1 class="display-5 mb-5" style="font-size: 2.5rem;">{{ $menu->title }}</h1>
        </div>
        <div class="row gy-5 gx-4">

            @if (request()->is('survei/survei-visi*'))
                <iframe src="{{ $menu->content }}?embedded=true" width="100%" height="1080" frameborder="0"
                    marginheight="0" marginwidth="0">Memuat…</iframe>
            @else
                <p class="m-4" style="font-size: 0.85rem;">{!! $menu->content !!}</p>
            @endif
        </div>
    </div>
@endsection
