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

    <div class="container p-lg-5 p-3 bg-white shadow-lg" style="margin-top: -150px;">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">{{ $menu }}</p>
            <h1 class="display-5 mb-5" style="font-size: 2.5rem;">{{ ucwords(str_replace('_', ' ', $kategory)) }}</h1>
        </div>

        <div class="row">
            @foreach ($news as $nws)
                <div class="col-md-6 col-sm-6 col-lg-4 wow fadeInUp mb-5" data-wow-delay="0.1s">
                    <div class="service-item top-0 shadow-lg m-0">
                        @if ($nws->image == null)
                            <img class="img-fluid" src="{{ asset('home-assets') }}/img/service-1.jpg" alt="">
                        @else
                            <img class="img-fluid" src="{{ asset('storage/' . $nws->image) }}" alt="">
                        @endif
                        <div class="service-detail">
                            <div class="service-title d-block pt-4">
                                @if ($nws->image == null)
                                    <div
                                        style="background-image: url({{ asset('home-assets/img/service-1.jpg') }}); height: 150px; width: 100%; background-size: cover; background-position: center;">
                                    </div>
                                @else
                                    <div
                                        style="background-image: url({{ asset("storage/$nws->image") }}); height: 150px; width: 300px; background-size: cover; background-position: center;">
                                    </div>
                                @endif
                                <hr class="w-25 mx-auto bg-dark">
                                <h3 class="mb-0" style="font-size: 1rem;">{{ $nws->title }}
                                </h3>
                                <hr class="w-25 mx-auto bg-dark">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0" style="font-size: 0.85rem;">
                                    {!! str()->limit($nws->content, 170, ' ...') !!}</p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="{{ url("$menu/$kategory/$nws->slug") }}"
                            style="font-size: 0.85rem;">Read More</a>
                    </div>
                </div>
            @endforeach

            <div class="mt-4">
                {{ $news->links('vendor.pagination.bootstrap-5') }}
            </div>

        </div>

    </div>
@endsection
