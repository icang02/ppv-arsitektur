<div class="container-fluid bg-dark pt-5 my-5 px-0">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Our Projects</p>
        <h1 class="display-5 text-white mb-5" style="font-size: 2.5rem;">See What We Have Completed Recently</h1>
    </div>
    <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
        @for ($i = 0; $i < 5; $i++)
            <a class="project-item" href="">
                <img class="img-fluid" src="{{ asset('home-assets') }}/img/project-1.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0" style="font-size: 0.85rem;">Auto Engineering</h5>
                </div>
            </a>
        @endfor
    </div>
</div>
