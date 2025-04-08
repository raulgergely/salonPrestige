@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="alert alert-danger">
            <h4 class="alert-heading">Ceva nu a mers bine!</h4>
            <p>Ne pare rău, dar a apărut o eroare în procesul de încărcare a paginii.</p>
            <hr>
            <p class="mb-0">Vă rugăm să încercați din nou mai târziu sau să reveniți la <a href="{{ url('/') }}">pagina principală</a>.</p>
        </div>
    </div>
@endsection
