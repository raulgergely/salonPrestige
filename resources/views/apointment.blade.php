@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/appointment.css') }}">
@endpush
@section('content')
<div class="container ">
    <h2 class="text-center my-4" style="background-color: ">@lang('services.appointment_title')</h2>

    <form action="{{route('appointment')}}" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="mb-4">
            <label for="name" class="form-label d-block text-center fw-bold fs-4">@lang('services.appointment_name')</label>
            <input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
            <div class="invalid-feedback">
                @lang('errors.appointment_error_name')
            </div>
        </div>

        <div class="mb-4">
            <label for="phone" class="form-label d-block text-center fw-bold fs-4">@lang('services.appointment_phone')</label>
            <input type="tel" name="phone" id="phone" class="form-control" pattern="(\+40|0)[0-9]{9}" placeholder="Ex: 0712345678" autocomplete="off" required>
            <div class="invalid-feedback">
                @lang('errors.appointment_error_phone')
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label d-block text-center fw-bold fs-4">@lang('services.appointment_choose_services')</label>
            <div class="row justify-content-center">
                @php
                    $services = [
                        ['name' => 'Machiaj de zi'],
                        ['name' => 'Machiaj de seara'],
                        ['name' => 'Machiaj de nunta'],
                        ['name' => 'Extensii gene'],
                        ['name' => 'Laminare sprâncene'],
                        ['name' => 'Micropigmentare buze'],
                        ['name' => 'Pensat + Laminare + Vopsit'],
                    ];
                @endphp
               <div class="d-flex flex-wrap justify-content-center flex-wrap-gap">
                @foreach ($services as $index => $service)
                    <div class="col-md-2 col-6 d-flex align-items-center">
                        <input type="radio" name="service" id="{{ $service['name'] }}" value="{{ $service['name'] }}" class="btn-check" @if($index === $appointmentServices) checked @endif required>
                        <label for="{{ $service['name'] }}" class="service-card mb-0">
                            <span>{{ $service['name'] }}</span>
                        </label>
                    </div>
                @endforeach
                </div>

            </div>
            <div class="invalid-feedback">
                @lang('errors.appointment_error_services')
            </div>
        </div>

        <div class="mb-3 text-center ">
            <label class="form-label fw-bold fs-4">@lang('services.appointment_pick_date')</label>
            <div class="d-flex justify-content-center flex-wrap-gap-calendar">
                <div id="calendar-container"></div>
            </div>
            <input type="hidden" name="date" id="selected-date">
        </div>


        <div class="mb-4">
            <label class="form-label d-block text-center fw-bold fs-4">@lang('services.appointment_pick_hour')</label>
            <div class="row justify-content-center">
                @php
                    $hours = ['08:00-10:00', '11:00-12:00', '14:00-16:00', '17:00-19:00'];
                @endphp
                @foreach ($hours as $index=>$hour)
                    <div class="col-md-2 col-4 mb-2">
                        <input type="radio" name="hour" id="hour-{{ $hour }}" value="{{ $hour }}" class="btn-check"
                            @if($index == 0) checked @endif>

                        <label for="hour-{{ $hour }}" class="hour-card">
                            <i class="fas fa-clock fa-lg"></i>
                            <span>{{ $hour }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <label for="message" class="form-label d-block text-center fw-bold fs-4">@lang('services.appointment_message')</label>
            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Scrie un mesaj pentru noi (opțional)" autocomplete="off" style="resize: none;"></textarea>
            <div class="invalid-feedback">
               @lang('errors.appointment_error_message')
            </div>
        </div>
        <div class="text-center my-4">
            <button type="submit" class="btn btn-modern w-50">@lang('services.appointment_book')</button>
        </div>
    </form>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ro.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#calendar-container", {
        inline: true,
        dateFormat: "d-m-Y",
        minDate: "today",
        showMonths: window.innerWidth < 768 ? 1 : 2, // O lună pe mobil, 2 luni pe desktop
        disable: [
            function(date) {
                const day = date.getDate();
                const month = date.getMonth() + 1; // Lunile sunt indexate de la 0, deci +1

                return (
                    date.getDay() === 0 || // Dezactivează duminica
                    date.getDay() === 6 || // Dezactivează sâmbăta
                    (day === 25 && month === 12) || // Dezactivează 25 Decembrie (Crăciunul)
                    (day === 26 && month === 12) || // A doua zi de Crăciun
                    (day === 1 && month === 1)||  // Dezactivează 1 Ianuarie (Anul Nou)
                    (day === 2 && month === 1)||  // Dezactivează 2 Ianuarie (Anul Nou)
                    (day === 24 && month === 1)||  // Dezactivează 24 Ianuarie (Ziua Unirii Principatelor)
                    (day === 1 && month === 5) || // Dezactivează 1 Mai (Ziua Muncii)
                    (day === 15 && month === 8)||  // Dezactivează 15 August (Adormirea Maicii Domnului)
                    (day === 30 && month === 11)||  // Dezactivează 30 Noiembrie (Sfântul Andrei)
                    (day === 1 && month === 12)  // Dezactivează 1 Decembrie (Ziua Națională a României)
                );
            }
        ],
        locale: flatpickr.l10ns.ro,
        onChange: function(selectedDates, dateStr) {
            document.getElementById("selected-date").value = dateStr;
        }
    });
});
(function () {
  'use strict'

  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

@endsection
