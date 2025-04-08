@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')
<div class="containerContact py-5 text-center">
    <div class="mb-5">
        <h2 class="display-4 text-dark">@lang('services.contact_title')</h2>
        <p class="lead text-muted">@lang('services.contact_subtitle')</p>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3 class="text-dark">@lang('services.contact_information')</h3>
            <p><strong>@lang('services.contact_adress'):</strong> @lang('services.contact_street') Carol Telbisz 6, Timisoara</p>
            <p><strong>@lang('services.contact_phone'):</strong>+40 749 141 491</p>
            <p><strong>@lang('services.contact_email'):</strong> contact@salon.ro</p>
            <p><strong>@lang('services.contact_follow'):</strong></p>
            <div class="d-flex justify-content-center">
                <a href="#" class="me-4">
                    <img src="{{asset('images/facebook.png')}}" class="icon-images" alt="Facebook"/>
                </a><a href="#" class="me-4">
                    <img src="{{asset('images/instagram.png')}}" class="icon-images" alt="Instagram"/>
                </a><a href="#">
                    <img src="{{asset('images/tik-tok.png')}}" class="icon-images" alt="Tiktok"/>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <h3 class="text-dark">@lang('services.contact_message')</h3>
            <form action="" method="POST">
                @csrf
                <div class="mt-4 mb-3">
                    <input type="text" name="name" class="form-control" placeholder="@lang('services.contact_name')" required>
                </div>
                <div class="mt-4 mb-3">
                    <input type="email" name="email" class="form-control" placeholder="@lang('services.contact_email')" required>
                </div>
                <div class="mt-4 mb-3">
                    <textarea name="message" class="form-control" rows="5" placeholder="@lang('services.contact_your_message')" required></textarea>
                </div>
                <button type="submit" class="btn custom-btn-primary">@lang('services.contact_send')</button>
            </form>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="text-dark">@lang('services.contact_find_here')</h4>
        <div class="google-map mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1391.9474017671694!2d21.228019403064735!3d45.75325485858086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47455d80141b7a61%3A0x83b678f457c4f16f!2sStrada%20Carol%20Telbisz%206%2C%20Timi%C8%99oara!5e0!3m2!1sro!2sro!4v1742558266331!5m2!1sro!2sro" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h5 class="openGoogleMaps mt-5"><a class="openGoogleMaps" href="https://www.google.com/maps/place/Strada+Carol+Telbisz+6,+Timi%C8%99oara" target="_blank">@lang('services.contact_google_maps')</a></h5>

        </div>
    </div>
</div>
@endsection
