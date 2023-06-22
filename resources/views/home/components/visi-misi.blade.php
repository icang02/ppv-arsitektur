<div class="container-xxl p-lg-5 p-3">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="row gx-3 h-100 wow fadeInUp" ata-wow-delay="0.2s">
                    <img class="img-fluid" src="{{ asset('storage/' . $visimisi[2]->image) }}">
                </div>
            </div>
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.5s">
                <p class="fw-medium text-uppercase text-primary mb-2">D-III Teknik Arsitektur</p>
                <h1 class="display-5 mb-4" style="font-size: 2.5rem;">Sejarah Singkat</h1>
                <div class="d-flex mb-3">
                    <p style="font-size: 0.9rem; text-align: justify !important;">{!! $visimisi[2]->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl p-lg-5 p-3">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <p class="fw-medium text-uppercase text-primary mb-2">D-III Teknik Arsitektur</p>
            <h1 class="display-5 mb-4" style="font-size: 2.5rem;">Visi - Misi</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0 btn-square rounded-circle bg-primary">
                        <i class="fa fa-star text-white" style="font-size: 0.8rem;"></i>
                    </div>
                    <div class="ms-3">
                        <h4 style="font-size: 1.25rem;">{{ $visimisi[0]->title }}</h4>
                        <p style="font-size: 0.9rem; text-align: justify !important;">{!! $visimisi[0]->content !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0 btn-square rounded-circle bg-primary">
                        <i class="fa fa-star text-white" style="font-size: 0.8rem;"></i>
                    </div>
                    <div class="ms-3">
                        <h4 style="font-size: 1.25rem;">{{ $visimisi[1]->title }}</h4>
                        <p style="font-size: 0.9rem; text-align: justify !important;">{!! $visimisi[1]->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
