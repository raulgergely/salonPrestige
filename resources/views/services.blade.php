@extends('layouts.app')
@push("styles")
<link rel="stylesheet" href="{{ asset('css/services.css') }}">
@endpush

@section('content')
<div class="containerServices text-center">
    <div class="mb-5">
        <h2 class="display-4 text-dark">@lang("services.services_title")</h2>
        <p class="lead text-muted">@lang("services.services_subtitle").</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

        @foreach ($services as $service)
            <div class="col">
                <div class="card flip-card custom-card w-100" onclick="flipCard(this)">
                    <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="{{ asset($service['image']) }}" class="card-img-top" alt="{{ $service['name'] }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $service['name'] }}</h5>
                            <p class="card-text">{{ $service['desc'] }}</p>
                            <div class="price-container">
                                <span class="current-price">{{ $service['price'] }}</span>
                                @isset($service['old_price'])
                                    <span class="old-price">{{ $service['old_price'] }}</span>
                                    @php
                                    $oldPrice = floatval(str_replace(['RON', 'LEI', ' '], '', $service['old_price']));
                                    $newPrice = floatval(str_replace(['RON', 'LEI', ' '], '', $service['price']));

                                    $discount = (($oldPrice - $newPrice) / $oldPrice) * 100;
                                @endphp
                                <span class="discount-badge">
                                    -{{ round($discount) }}%
                                </span>
                                    @endisset
                            </div>
                            <a href="{{route( $service['link'])}}" class="btn custom-btn-primary mt-3">@lang('services.services_book_now')</a>
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <h5 class="card-title">{{ $service['name'] }}</h5>
                        <p class="card-text p-2">{{ $service['long_desc'] }}</p>
                        <div class="price-container">
                            <span class="current-price">{{ $service['price'] }}</span>
                            @isset($service['old_price'])
                                <span class="old-price">{{ $service['old_price'] }}</span>
                            @endisset
                        </div>
                        <div class="d-flex gap-2">
                            <a onclick="scrollToDetails(event, '{{ $service['name'] }}')" class="btn custom-btn-primary mt-3">@lang('services.services_details')</a>
                            <a href="{{route( $service['link'])}}" class="btn custom-btn-primary mt-3">@lang('services.services_book_now')</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
  @endforeach
    </div>
    <div class="mt-5">
        <h2 class="titleServices">@lang("services.services_title_treatments")</h2>
        @foreach ($services as $service)
        <div id="{{ $service['name'] }}" class="mt-5">
            <p class="title-detailed-services">{{ $service['name'] }}</p>
            <p class="text-detailed-services">{{ $service['detailed_desc'] }}</p>
        </div>
        @endforeach
    </div>
</div>


<script>
    function flipCard(card) {
  card.classList.toggle("flipped");
}
window.addEventListener('load', () => {
        window.scrollTo(0, 0);
    });
    if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
    }
    function scrollToDetails(event, id) {
        event.preventDefault();
        const element = document.getElementById(id);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
</script>
@endsection
