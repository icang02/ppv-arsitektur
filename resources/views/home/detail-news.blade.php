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

    <style>
        .cont {
            padding: 0 8rem;
        }

        #container-berita {
            flex-wrap: nowrap;
        }

        #berita {
            width: 73.5%;
        }

        #berita-lainnya {
            width: 25%;
        }

        #gambar-berita {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 4px;
        }

        @media only screen and (max-width: 576px) {
            .cont {
                padding: 0 0.5rem;
            }

            #container-berita {
                flex-wrap: wrap;
            }

            #berita,
            #berita-lainnya {
                width: 100%;
            }

            #gambar-berita {
                width: 100%;
                height: 150px;
            }
        }
    </style>

    <div class="cont">
        <div class="p-5 bg-white shadow-lg mb-3">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
                <p class="fw-medium text-uppercase text-primary mb-4">{{ Str::ucfirst($news->title) }}</p>
                <hr style="background: #FF5E14; width: 15%; height: 4px; margin: auto; margin-bottom: 0.6rem;">
                <h1 style="font-size: 2rem;">{{ $kategori }}</h1>
                <hr style="background: #FF5E14; width: 15%; height: 4px; margin: auto; margin-top: 1rem;">
            </div>
        </div>

        <div class="d-flex gap-3 align-items-start" id="container-berita">
            {{-- Content berita --}}
            <div class="p-lg-5 px-4 py-5 bg-white shadow-lg" id="berita">
                @if ($news->image)
                    <img src="{{ asset("storage/$news->image") }}" alt="Image" id="gambar-berita">
                @else
                    <img src="https://asset.kompas.com/crops/25hhF38dli3VSfKY5g8lIbzRDxA=/0x0:1000x667/750x500/data/photo/2022/05/01/626e236fbfeb9.png"
                        alt="Image" id="gambar-berita">
                @endif
                <h5 class="mt-3">{{ $news->title }}</h5>
                <p class="text-muted mt-3" style="font-size: 0.85rem">
                    <i class="fa-sharp fa-solid fa-calendar-days me-1"></i>
                    {{ $news->date }}
                    <i class="fa-solid fa-eye ms-3"></i> <span class="fw-bold"> {{ $news->views }}x dilihat</span>

                    <span class="ms-2 badge btn btn-primary btn-sm rounded-3"
                        style="background-color: #FF5E14;">{{ $kategori }}
                    </span>
                </p>
                <p class="card-text" style="text-align: left">
                    {!! $news->content !!}
                </p>
            </div>

            {{-- Berita lainnya --}}
            <div class="px-4 pt-5 pb-3 bg-white shadow-lg" id="berita-lainnya">
                <h6 class="text-center">Artikel Lainnya</h6>
                <hr>
                @foreach ($allnews as $news)
                    <div class="d-flex">
                        @if ($news->image)
                            <img src="{{ asset("storge/$news->image") }}" alt="Image"
                                style="width: 90px; height: 80px; object-fit: cover; border-radius: 4px;">
                        @else
                            <img src="https://asset.kompas.com/crops/25hhF38dli3VSfKY5g8lIbzRDxA=/0x0:1000x667/750x500/data/photo/2022/05/01/626e236fbfeb9.png"
                                alt="Image" style="width: 90px; height: 80px; object-fit: cover; border-radius: 4px;">
                        @endif

                        <div class="ms-2">
                            <a href="{{ url('berita/' . str()->lower($kategori) . "/$news->slug") }}">
                                <small>{{ $news->title }}</small>
                            </a>
                            <small class="d-block mt-1"
                                style="font-size: 0.75rem; font-style: italic;">{{ $news->date }}</small>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
