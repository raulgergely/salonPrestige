@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h2 class="text-danger" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">A Apărut o Problemă!</h2>
            <p class="lead text-muted" style="font-size: 1.2rem;">Îmi pare rău, dar serverul nostru a întâmpinat o problemă. Te rugăm să încerci din nou mai târziu.</p>

            <div class="alert alert-danger p-4 my-4" style="border-radius: 10px; background-color: #f8d7da; color: #721c24;">
                <h4 class="alert-heading" style="font-weight: bold;">Ce poți face?</h4>
                <p>Dacă problema persistă, contactează-ne pentru asistență. Între timp, poți încerca să reîncarci pagina sau să aștepți câteva momente.</p>
            </div>

            <div class="my-4">
                <a href="{{ url('/') }}" class="btn btn-outline-danger btn-lg" style="font-weight: bold; border-radius: 30px;">Înapoi la Home</a>
            </div>
        </div>
    </div>
@endsection
