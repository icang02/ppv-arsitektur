@extends('layouts.home')

@section('main-contents')
    <!-- Carousel Start -->
    @include('home.components.slider', ['silders' => $sliders])
    <!-- Carousel End -->


    <!-- Team Start -->
    @include('home.components.kaprodi', ['kaprodi' => $direktur])
    <!-- Team End -->


    <!-- About Start -->
    <div style="margin: 0rem 0 6rem 0 !important;">
        @include('home.components.visi-misi', ['visimisi' => $visimisi])
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div style="margin: 6rem 0 9rem 0 !important;">
        @include('home.components.facts')
    </div>
    <!-- Facts End -->


    <!-- Features Start -->
    <div style="margin: 6rem 0 6rem 0 !important;">
        @include('home.components.features')
    </div>
    <!-- Features End -->


    <!-- Video Modal Start -->
    @include('home.components.video-modal')
    <!-- Video Modal End -->


    <!-- Service Start -->
    {{-- <div style="margin: 6rem 0 6rem 0 !important;">
        @include('home.components.service')
    </div> --}}
    <!-- Service End -->


    <!-- Project Start -->
    <div style="margin: 6rem 0 9rem 0 !important;">
        @include('home.components.project')
    </div>
    <!-- Project End -->



    <!-- Testimonial Start -->
    {{-- @include('home.components.testimonial') --}}
    <!-- Testimonial End -->
@endsection
