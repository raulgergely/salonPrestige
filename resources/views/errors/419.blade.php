@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h2 class="text-danger" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Pagina Expirată!</h2>
            <p class="lead text-muted" style="font-size: 1.2rem;">Îmi pare rău, dar sesiunea ta a expirat. Te rugăm să te autentifici din nou.</p>

            <div class="alert alert-warning p-4 my-4" style="border-radius: 10px; background-color: #f4e1d2; color: #9c1c1c;">
                <h4 class="alert-heading" style="font-weight: bold;">Cum să rezolvi</h4>
                <p>Sesiunea ta a expirat din cauza inactivității sau a unei cereri incorecte. Poți să te autentifici din nou și să încerci din nou.</p>
            </div>

            <div class="my-4">
                <a href="{{ route('login') }}" class="btn btn-outline-danger btn-lg" style="font-weight: bold; border-radius: 30px;">Autentifică-te din nou</a>
            </div>
        </div>
    </div>
@endsection
