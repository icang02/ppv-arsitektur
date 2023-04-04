<div class="container-fluid bg-dark pt-5 px-0">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2" style="font-size: 2.5rem;">Album Foto</p>
        <p class="text-white mb-5">Dokumentasi Prodi Teknik Mesin Program Pendidikan Vokasi<br>Universitas Halu
            Oleo</p>
    </div>
    <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
        @for ($i = 0; $i < 5; $i++)
            <a class="project-item" href="">
                <img class="img-fluid" src="{{ url('https://jeda.id/files/2019/09/27-haluoleo-2-1200x900.jpg') }}"
                    alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0" style="font-size: 0.85rem;">Caption</h5>
                </div>
            </a>
        @endfor
    </div>
</div>
