@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/aboutMakeup.css') }}">
@endpush

@section('content')
<div class="container py-5">
    <h2 class="text-center text-dark display-4 mb-4 mt-4">@lang("services.makeup_pro_title")</h2>
    <p class="lead text-center mb-5">@lang("services.makeup_pro_subtitle")</p>

    <div class="row">
        <div class="col-md-6">
            <h3 class="text-dark">@lang("services.makeup_pro_p1_title")</h3>
            <ul class="list-unstyled">
                <li>@lang("services.makeup_pro_p1_desc1")</li>
                <li>@lang("services.makeup_pro_p1_desc2")</li>
                <li>@lang("services.makeup_pro_p1_desc3")</li>
                <li>@lang("services.makeup_pro_p1_desc4")</li>
                <li>@lang("services.makeup_pro_p1_desc5")</li>
            </ul>
        </div>

        <div class="col-md-6">
            <h3 class="text-dark">@lang("services.makeup_pro_p2_title")</h3>
            <p>@lang("services.makeup_pro_p2_desc")</p>
            <ul class="list-unstyled">
                <li>@lang("services.makeup_pro_p2_li1")</li>
                <li>@lang("services.makeup_pro_p2_li2")</li>
                <li>@lang("services.makeup_pro_p2_li3")</li>
                <li>@lang("services.makeup_pro_p2_li4")</li>
                <li>@lang("services.makeup_pro_p2_li5")</li>
                <li>@lang("services.makeup_pro_p2_li6")</li>
            </ul>
            <p>@lang("services.makeup_pro_p2_desc2")</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-dark mt-5 mb-4">@lang('services.makeup_pro_types')</h2>
        </div>
        <div class="d-flex flex-row" >
        <div class="col-md-4 ms-2 me-2">
            <div class="card mb-4 h-100">
                <img src="{{ asset('images/pozaservices.jpg') }}" class="card-img-top" alt="Machiaj de zi">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">@lang('services.makeup_pro_card1_title')</h5>
                    <p class="card-text">@lang('services.makeup_pro_card1_desc')</p>
                    <a href="{{route('dayMakeup')}}" class="btn btn-primary">@lang('services.makeup_pro_card1_appointment')</a>
                </div>
            </div>
        </div>

        <div class="col-md-4  ms-2 me-2">
            <div class="card mb-4 h-100">
                <img src="{{ asset('images/pozaservices.jpg') }}" class="card-img-top" alt="Machiaj de seară">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">@lang('services.makeup_pro_card2_title')</h5>
                    <p class="card-text">@lang('services.makeup_pro_card2_desc')</p>
                    <a href="{{route('nightMakeup')}}" class="btn btn-primary">@lang('services.makeup_pro_card2_appointment')</a>
                </div>
            </div>
        </div>

        <div class="col-md-4  ms-2 me-2">
            <div class="card mb-4 h-100">
                <img src="{{ asset('images/pozaservices.jpg') }}" class="card-img-top" alt="Machiaj de nuntă">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">@lang('services.makeup_pro_card3_title')</h5>
                    <p class="card-text">@lang('services.makeup_pro_card3_desc')</p>
                    <a href="{{route('eventMakeup')}}" class="btn btn-primary">@lang('services.makeup_pro_card3_appointment')</a>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{route('apointment')}}" class="btn btn-primary btn-lg">@lang('services.makeup_pro_book_makeup')</a>
    </div>
</div>

@endsection
