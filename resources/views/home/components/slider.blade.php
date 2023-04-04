<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <style>
                .slider {
                    object-fit: cover;
                    height: 78vh;
                }
            </style>
            @foreach ($sliders as $slider)
                @if ($loop->iteration == 1)
                    <div class="carousel-item active">
                    @else
                        <div class="carousel-item ">
                @endif
                <img class="w-100 slider" src="{{ asset("storage/$slider->image") }}">
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
