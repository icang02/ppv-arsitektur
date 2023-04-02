<div class="container-xxl p-lg-5 p-3">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="row gx-3 h-100">
                    <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid" src="{{ asset('home-assets') }}/img/about-1.jpg">
                    </div>
                    <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                        <img class="img-fluid" src="{{ asset('home-assets') }}/img/about-2.jpg">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="fw-medium text-uppercase text-primary mb-2">D-III Teknik Arsitektur</p>
                <h1 class="display-5 mb-4" style="font-size: 2.5rem;">Visi - Misi</h1>
                @foreach ($visimisi as $vm)
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 btn-square rounded-circle bg-primary">
                            <i class="fa fa-star text-white" style="font-size: 0.8rem;"></i>
                        </div>
                        <div class="ms-4">
                            <h4 style="font-size: 1.25rem;">{{ $vm->title }}</h4>
                            <p style="font-size: 0.9rem; text-align: justify !important;">{!! $vm->content !!}</p>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="row pt-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Email us</p>
                                <h5 class="mb-0">info@example.com</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Call us</p>
                                <h5 class="mb-0">+012 345 6789</h5>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
