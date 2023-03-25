<div class="container-xxl p-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Our Team</p>
            <h1 class="display-5 mb-5" style="font-size: 2.5rem;">Dedicated Team Members</h1>
        </div>
        <div class="row g-4">
            @for ($i = 0; $i < 4; $i++)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <img class="img-fluid" src="{{ asset('home-assets') }}/img/team-1.jpg" alt="">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                <i class="fa fa-2x fa-share text-white"></i>
                            </div>
                            <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                                style="height: 90px;">
                                <h5 style="font-size: 1rem;">Rob Miller</h5>
                                <span class="text-primary" style="font-size: 1rem;">CEO & Founder</span>
                                <div class="team-social">
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
