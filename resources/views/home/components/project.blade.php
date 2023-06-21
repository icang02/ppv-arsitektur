<div class="container-fluid bg-dark pt-5 px-0">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2" style="font-size: 2.5rem;">Album Foto</p>
        <p class="text-white mb-5">Dokumentasi Prodi D3 Teknik Arsitektur Program Pendidikan Vokasi<br>Universitas Halu
            Oleo</p>
    </div>

    @php
        $galleries = App\Models\Gallery::all();
    @endphp
    <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
        @foreach ($galleries as $galeri)
            <a class="project-item" href="">
                <img class="img-fluid" src="{{ asset("storage/$galeri->image") }}" alt="gambar"
                    style="width: 100%; height: 300px; object-fit: cover;">
                <div class="project-title">
                    <h5 class="text-primary mb-0" style="font-size: 0.85rem;">{{ $galeri->caption }}</h5>
                </div>
            </a>
        @endforeach
    </div>
</div>
