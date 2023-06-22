@extends('layouts.home')

@section('main-contents')
    <style>
        body {
            background-color: #EFEFEF
        }
    </style>

    @php
        $image = 'home-assets/img/bg-page.jpg';
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

    <div class="container p-lg-5 p-3 bg-white shadow-lg" style="margin-top: -150px;">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Fasilitas</p>
            <h1 class="display-5 mb-5" style="font-size: 2.5rem;">
                Daftar Fasilitas</h1>
        </div>

        <div class="row">
            @forelse ($fasilitas as $nws)
                @php
                    $foto = App\Models\FotoFasilitas::where('fasilitas_id', $nws->id)
                        ->get()
                        ->first();
                @endphp
                <div class="col-lg-4 mb-4">
                    <div class="card shadow">
                        <div class="card-img-top"
                            style="background-image: url({{ asset("storage/$foto->foto") }}); height: 300px; background-size: cover; background-position: center; margin-top: -8px;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $nws->nama }}</h5>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">Belum ada data</h3>
            @endforelse

        </div>

    </div>
@endsection
