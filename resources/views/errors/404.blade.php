@extends('layouts.error')

@section('content')
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-4 text-center">
            <h2 class="text-danger" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Pagina nu a fost găsită!</h2>
            <p class="lead text-muted" style="font-size: 1.2rem;">Îmi pare rău, dar pagina pe care o cauți nu există.</p>

            <div class="alert alert-warning p-4 my-4" style="border-radius: 10px; background-color: #f4e1d2; color: #9c1c1c;">
                <h4 class="alert-heading" style="font-weight: bold;">Vrei să te întorci pe Home?</h4>
                <p>Poți naviga înapoi pe site prin apăsarea butonului de mai jos.</p>
            </div>

            <div class="my-4">
                <a href="{{ url('/') }}" class="btn btn-outline-danger btn-lg" style="font-weight: bold; border-radius: 30px;">Înapoi la Home</a>
            </div>
        </div>
    </div>
@endsection

