@extends('layouts.app')

@section('content')

<section class="hero">
    <img src="{{ asset('images/saloon.jpg') }}" class="hero-image" alt="Salon Luxury">

    <div class="hero-overlay"></div>
    <div class="hero-content text-center" >
        <h1 class="display-3 fw-bold" style="color:goldenrod;font-size:6rem;">Salon Prestige</h1>
        <p class="lead fw-bold" style="color:#d47373;font-size:1.5rem;">@lang('services.home_text_brand_desc')</p>
        <a href="/programare" class="btn btn-gold btn-lg mt-3">@lang('services.home_text_brand_btn')</a>
    </div>
</section>

<section class="container my-5">
    <h2 class="text-center mb-4" data-aos="fade-up">@lang('services.home_text_services')</h2>
    <div class="row">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card">
                <i class="fa-solid fa-scissors fa-3x mb-3"></i>
                <h4>@lang('services.home_services1_title')</h4>
                <p>@lang('services.home_services1_desc')</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="service-card">
                <i class="fa-solid fa-hand-sparkles fa-3x mb-3"></i>
                <h4>@lang('services.home_services2_title')</h4>
                <p>@lang('services.home_services2_desc')</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="600">
            <div class="service-card">
                <i class="fa-solid fa-spa fa-3x mb-3"></i>
                <h4>@lang('services.home_services3_title')</h4>
                <p>@lang('services.home_services3_desc')</p>
            </div>
        </div>
    </div>
</section>

@endsection
