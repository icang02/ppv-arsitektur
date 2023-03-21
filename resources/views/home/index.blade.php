@extends('layouts.home')

@section('main-content')
    <!-- Carousel Start -->
    @include('home.components.carousel')
    <!-- Carousel End -->


    <!-- Team Start -->
    @include('home.components.team')
    <!-- Team End -->


    <!-- About Start -->
    @include('home.components.about')
    <!-- About End -->


    <!-- Facts Start -->
    @include('home.components.facts')
    <!-- Facts End -->


    <!-- Features Start -->
    @include('home.components.features')
    <!-- Features End -->


    <!-- Video Modal Start -->
    @include('home.components.video-modal')
    <!-- Video Modal End -->


    <!-- Service Start -->
    @include('home.components.service')
    <!-- Service End -->


    <!-- Project Start -->
    @include('home.components.project')
    <!-- Project End -->



    <!-- Testimonial Start -->
    {{-- @include('home.components.testimonial') --}}
    <!-- Testimonial End -->
@endsection
