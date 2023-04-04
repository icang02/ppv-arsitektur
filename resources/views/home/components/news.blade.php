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
                        <a class="btn btn-light" href="{{ url("berita/berita/$nws->slug") }}"
                            style="font-size: 0.85rem;">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
