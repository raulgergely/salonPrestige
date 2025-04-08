@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h2 class="text-danger" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">@lang('errors.error_401_unauthorized')</h2>
            <p class="lead text-muted" style="font-size: 1.2rem;">@lang('errors.error_401_login_required')</p>

            <div class="alert alert-warning p-4 my-4" style="border-radius: 10px; background-color: #f4e1d2; color: #9c1c1c;">
                <h4 class="alert-heading" style="font-weight: bold;">@lang('errors.error_401_login_prompt')</h4>
                <p>@lang('errors.error_401_section_restricted')</p>
            </div>

            <div class="my-4">
                <a href="{{ route('login') }}" class="btn btn-outline-danger btn-lg" style="font-weight: bold; border-radius: 30px;">@lang('errors.error_401_login_now')</a>
            </div>
        </div>
    </div>
@endsection
