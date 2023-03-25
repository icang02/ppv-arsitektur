<div class="container p-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Our Services</p>
            <h1 class="display-5 mb-4" style="font-size: 2.5rem;">We Provide Best Industrial Services</h1>
        </div>
        <div class="row gy-5 gx-4">
            @for ($i = 0; $i < 8; $i++)
                <div class="col-md-6 col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <img class="img-fluid" src="{{ asset('home-assets') }}/img/service-1.jpg" alt="">
                        <div class="service-img">
                            <img class="img-fluid" src="{{ asset('home-assets') }}/img/service-1.jpg" alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0" style="font-size: 1.2rem;">Civil & Gas Engineering</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                {{-- <p class="text-white mb-0" style="font-size: 0.85rem;">Erat ipsum justo amet duo et
                                    elitr
                                    dolor, est duo duo eos
                                    lorem sed diam stet diam sed stet.</p> --}}
                            </div>
                        </div>
                        <a class="btn btn-light" href="" style="font-size: 0.85rem;">Read More</a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
