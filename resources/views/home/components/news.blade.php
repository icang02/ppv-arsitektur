<div class="container-xxl px-3">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">D-III Teknik Arsitektur</p>
            <h1 class="display-5 mb-5" style="font-size: 2.5rem;">Berita Terbaru</h1>
        </div>
        <div class="row g-4">
            @foreach ($news as $nws)
                <div class="col-md-6 col-sm-6 col-lg-4 wow fadeInUp mb-5" data-wow-delay="0.1s">
                    <div class="service-item top-0 shadow-lg m-0">
                        @if ($nws->image == null)
                            <img class="img-fluid" src="{{ asset('home-assets') }}/img/service-1.jpg" alt="">
                        @else
                            <img class="img-fluid" src="{{ asset('storage/' . $nws->image) }}" alt="" style="width: 100%; height: 330px; object-fit: cover;">
                        @endif
                        <div class="service-detail">
                            <div class="service-title d-block pt-4">
                                @if ($nws->image == null)
                                    <img src="{{ asset('home-assets/img/service-1.jpg') }}" alt="Image" style="width: 100%; height: 120px; object-fit: cover;">
                                @else
                                    <img src="{{ asset("storage/$nws->image") }}" alt="Image" style="width: 100%; height: 120px; object-fit: cover;">
                                @endif
                                <hr class="w-25 mx-auto bg-dark">
                                <h3 class="mb-0" style="font-size: 1rem;">{{ $nws->title }}
                                </h3>
                                <hr class="w-25 mx-auto bg-dark">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0" style="font-size: 0.85rem;">
                                    {!! str()->limit($nws->title, 150, ' ...') !!}
                                    <i class="d-block mt-3">({{ Carbon\Carbon::createFromFormat('Y-m-d', $nws->date)->format('d F Y') }}
)</i>
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="{{ url("berita/berita/$nws->slug") }}"
                            style="font-size: 0.85rem;">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
