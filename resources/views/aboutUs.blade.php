@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/aboutUs.css') }}">
@endpush
@php
 $images = [
        'images/makeup.jpg',
        'images/makeup2.jpg',
        'images/makeup3.jpg',
        'images/pozaservices.jpg',
        'images/brow_lamination.jpg',
        'images/eyelash.jpg',
        'images/lip.jpg',
        'images/makeupday.jpg',
        'images/saloon.jpg'
    ];
@endphp
@section('content')
<div class="container about-us-container">

    <section class="intro-section">
        <h1 class="title text-center">@lang('services.about-us_title')</h1>
        <p class="intro-text text-center">@lang('services.about-us_title_desc')</p>
    </section>

    <section class="mission-vision">
        <div class="row">
            <div class="col-md-6">
                <h2 class="sub-title">@lang('services.about-us_subtitle_1')</h2>
                <p>@lang('services.about-us_subtitle_1_desc')</p>
            </div>
            <div class="col-md-6">
                <h2 class="sub-title">@lang('services.about-us_subtitle_2')</h2>
                <p>@lang('services.about-us_subtitle_2_desc')</p>
            </div>
        </div>
    </section>



<section class="why-choose-us">
    <h2 class="text-center">@lang('services.about-us_title_2')</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="reason-card">
                <img src="{{ asset('images/high-quality-products.jpg') }}" alt="Produse de calitate" class="reason-image" data-bs-toggle="modal" data-bs-target="#productModal">
                <h4>@lang('services.about-us-link1-title')</h4>
                <p>@lang('services.about-us-link1-desc')</p>
                <a class="moreAbout" href="{{route('qualityProducts')}}">@lang('services.about-us-link-more-details')</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="reason-card">
                <img src="{{ asset('images/high-quality-products.jpg') }}" alt="Profesionalism și Experiență" class="reason-image" data-bs-toggle="modal" data-bs-target="#experienceModal">
                <h4>@lang('services.about-us-link2-title')</h4>
                <p>@lang('services.about-us-link2-desc')</p>
                <a class="moreAbout" href="{{route('qualityProducts')}}">@lang('services.about-us-link-more-details')</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="reason-card">
                <img src="{{ asset('images/high-quality-products.jpg') }}" alt="Atmosferă relaxantă" class="reason-image" data-bs-toggle="modal" data-bs-target="#atmosphereModal">
                <h4>@lang('services.about-us-link3-title')</h4>
                <p>@lang('services.about-us-link3-desc')</p>
                <a class="moreAbout" href="{{route('qualityProducts')}}">@lang('services.about-us-link-more-details')</a> </div>
        </div>
    </div>
</section>





<section class="gallery-section">
    <h2 class="text-center">@lang('services.about-us-gallery')</h2>
    <div class="row">
        @foreach ($images as $index => $image)
            <div class="col-md-4 mb-3">
                <img src="{{ asset($image) }}" class="gallery-image img-fluid" alt="Machiaj {{ $index }}"
                     data-bs-toggle="modal" data-bs-target="#galleryModal" data-bs-slide-to="{{ $index - 1 }}">
            </div>
        @endforeach
    </div>
</section>

<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <div id="galleryCarousel" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
                @foreach ($images as $index => $image)
                <div class="carousel-item @if ($index == 0) active @endif text-center">
                    <img src="{{ asset($image) }}" class="d-block w-100" alt="Machiaj {{ $index + 1 }}">
                    <div class="photo-counter text-center mt-2">
                        <p class="mb-0">@lang('services.about-us-photo') {{ $index + 1 }} @lang('services.about-us-of') 9</p>
                    </div>
                </div>
            @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>


    <div class="contact-button text-center">
        <a href="{{ route('appointment') }}" class="btn btn-contact">@lang('services.about-us-contact-btn')</a>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    document.querySelectorAll('.gallery-image').forEach((img, index) => {
        img.addEventListener('click', () => {
            const carousel = new bootstrap.Carousel(document.querySelector('#galleryCarousel'), {
                interval: false
            });
            document.querySelector('#galleryCarousel').carousel(index);

            const carouselElement = document.querySelector('#galleryCarousel');
            carouselElement.addEventListener('slid.bs.carousel', () => {
                const activeIndex = [...document.querySelectorAll('.carousel-item')].findIndex(item => item.classList.contains('active'));
                document.querySelectorAll('.photo-counter p').forEach((counter, idx) => {
                    if (idx === activeIndex) {
                        counter.textContent = `Poza ${activeIndex + 1} din 9`;
                    }
                });
            });
        });
    });
    </script>


@endsection
