<div class="container p-lg-5 px-3">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Our Services</p>
            <h1 class="display-5 mb-4" style="font-size: 2.5rem;">We Provide Best Industrial Services</h1>
        </div>
        <div class="row gy-5 gx-4">
            @for ($i = 0; $i < 8; $i++)
                <div class="col-md-6 col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item"
                        style="border-style: solid; border-top-color: rgba(2,36,91,.4); border-right-color: rgb(2,36,91,.4); border-left-color: rgba(255,94,20,.4); border-bottom-color: rgba(255,94,20,.4);">
                        <img class="img-fluid"
                            src="{{ url('https://ti.eng.uho.ac.id/uploads/lectures/photos/Lectures__1662651554.jpg') }}"
                            alt="">
                        <div class="service-img">
                            <div
                                style="width: 100%; height: 100%; background-size: cover; background-position: center; background-image: url({{ url('https://ti.eng.uho.ac.id/uploads/lectures/photos/Lectures__1662651554.jpg') }})">
                            </div>
                            {{-- <img class="img-fluid"
                                src="{{ url('https://ti.eng.uho.ac.id/uploads/lectures/photos/Lectures__1662651554.jpg') }}"
                                alt=""> --}}
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0" style="font-size: 1.2rem;">Ilmi Faizan</h3>
                                <p class="mb-0 mt-3 fw-normal" style="font-size: 1rem;">Ketua Konsentrasi Hukum
                                    Pidana</p>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <div class="w-100">
                                    <p class="text-white mb-0" style="font-size: 0.85rem;">
                                        NIP:</p>
                                    <p class="text-white mb-0" style="font-size: 0.85rem;">123456789012345678</p>
                                    <hr class="bg-white">
                                    <p class="text-white mb-0" style="font-size: 0.85rem;">Email:</p>
                                    <p class="text-white mb-0" style="font-size: 0.85rem;">ilmifaizan1112@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-light" href="" style="font-size: 0.85rem;">Read More</a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
