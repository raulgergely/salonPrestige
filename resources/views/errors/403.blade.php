@extends('layouts.error')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h2 class="text-danger" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Acces Restricționat!</h2>
            <p class="lead text-muted" style="font-size: 1.2rem;">Îți pare rău, dar nu ai permisiunea necesară pentru a accesa această secțiune.</p>

            <div class="alert alert-warning p-4 my-4" style="border-radius: 10px; background-color: #f4e1d2; color: #9c1c1c;">
                <h4 class="alert-heading" style="font-weight: bold;">Vrei să ai acces?</h4>
                <p>Contactează administratorul pentru a obține acces la această pagină.</p>
            </div>

            <div class="my-4">
                <a href="{{ url('/') }}" class="btn btn-outline-danger btn-lg" style="font-weight: bold; border-radius: 30px;">Înapoi la Home</a>
            </div>
        </div>
    </div>
@endsection
