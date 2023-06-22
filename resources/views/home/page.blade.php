@extends('layouts.home')

@section('main-contents')
    <style>
        body {
            background-color: #EFEFEF
        }

        #gambar-berita {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 4px;
        }

        @media only screen and (max-width: 576px) {
            #gambar-berita {
                width: 100%;
                height: 100%;
            }
        }
    </style>

    @php
        if ($menu->image !== null) {
            $image = "storage/$menu->image";
            if (request()->is('akademik/kalender-akademik*')) {
                $image = 'home-assets/img/bg-page.jpg';
            }
        } else {
            $image = 'home-assets/img/bg-page.jpg';
        }
    @endphp

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn"
        style="background: linear-gradient(rgba(24, 29, 56, .4), rgba(24, 29, 56, .4)), url({{ asset($image) }}); background-size: cover; background-position: bottom;"
        data-wow-delay="0.1s">
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
        <div class="row gt-5 gx-4">
            <p class="mt-4 ms-4 me-4 mb-1" style="font-size: 0.85rem;">{!! $menu->content !!}</p>
            @if (request()->is('akademik/kalender-akademik'))
                <div class="text-center">
                    <embed src="{{ asset("storage/$menu->image") }}" type="application/pdf" width="100%" height="1200px">
                </div>
            @elseif (request()->is('survei*'))
                @if ($menu->image !== null)
                    <iframe src="{{ $menu->image }}?embedded=true" width="100%" height="1080" frameborder="0"
                        marginheight="0" marginwidth="0">Memuat…</iframe>
                @endif
            @endif
        </div>
    </div>
@endsection
