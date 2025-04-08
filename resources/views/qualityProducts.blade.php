@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/qualityProducts.css') }}">
@endpush

@section('content')
<div class="materials-section">
    <div class="container">
        <h1 class="page-title text-center mt-3">@lang('services.quality_product_title')</h1>
        <p class="section-intro text-center">@lang('services.quality_product_subtitle')</p>

        <div class="material-card">
            <h2>@lang('services.quality_product_p1')</h2>
            <p>@lang('services.quality_product_p1_desc1')</p>
            <p>@lang('services.quality_product_p1_desc2') </p>
            <div class="material-img">
                <img src="{{asset('images/quality-product.jpg')}}" alt="Produse de makeup premium">
            </div>
        </div>

        <div class="material-card">
            <h2>@lang('services.quality_product_p2')</h2>
            <p>@lang('services.quality_product_p2_desc1')</p>
            <p>@lang('services.quality_product_p2_desc2') </p>
            <div class="material-img">
                <img src="images/high-quality-products.jpg" alt="Cosmetice fără parabeni">
            </div>
        </div>

        <div class="material-card">
            <h2>@lang('services.quality_product_p3')</h2>
            <p>@lang('services.quality_product_p3_desc1')</p>
            <p>@lang('services.quality_product_p3_desc2') </p>
            <div class="material-img">
                <img src="images/high-quality-products.jpg" alt="Ingrediente naturale pentru machiaj">
            </div>
        </div>

        <div class="material-card">
            <h2>@lang('services.quality_product_p4')</h2>
            <p>@lang('services.quality_product_p4_desc1')</p>
            <p>@lang('services.quality_product_p4_desc2') </p>
            <div class="material-img">
                <img src="images/high-quality-products.jpg" alt="Produse cruelty-free">
            </div>
        </div>

        <div class="call-to-action mb-5">
            <p class="mb-5">@lang('services.quality_product_end_message')</p>
            <a href="{{ route('appointment') }}" class="btn-contact mt-4">@lang('services.quality_product_book')</a>
        </div>
    </div>
</div>

@endsection
