@php
    $kapro = $kaprodi[0];
@endphp
<div class="container-xxl px-lg-5 px-3">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative me-lg-4">
                    <div class="team-item">
                        <img class="img-fluid" src="{{ asset("storage/$kapro->image") }}" alt="{{ $kapro->position }}">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                <i class="fa fa-2x fa-share text-white"></i>
                            </div>
                            <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                                style="height: 90px;">
                                <h5 style="font-size: 1rem;">{{ $kapro->name }}</h5>
                                <span class="text-primary" style="font-size: 1rem;">{{ $kapro->position }}</span>
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
                    <span
                        class="position-absolute top-50 start-100 translate-middle bg-white rounded-circle d-none d-lg-block"
                        style="width: 120px; height: 120px;"></span>
                    <button type="button" class="btn-play" data-bs-toggle="modal"
                        data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                <p class="fw-medium text-uppercase text-primary mb-2">Video Profil</p>
                <h1 class="display-5 mb-4" style="font-size: 2.5rem;">Profil PPV Arsitektur</h1>
                <p class="mb-4 align-justify" style="font-size: 0.85rem;">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit.
                    Quisquam amet impedit, id necessitatibus, commodi sint quas laboriosam at fuga alias asperiores
                    eaque provident reiciendis temporibus repellat nemo pariatur. Unde est sit doloribus consequuntur
                    voluptate voluptatum fugit, optio dolorem amet! Esse?
                </p>
                {{-- <div class="row gy-4">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary">
                                <i class="fa fa-check text-white" style="font-size: 0.8rem;"></i>
                            </div>
                            <div class="ms-4">
                                <h4 style="font-size: 1rem;">Experienced Workers</h4>
                                <span style="font-size: 0.85rem;">Clita erat ipsum et lorem et sit, sed stet lorem sit
                                    clita duo justo magna
                                    dolore erat amet</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
