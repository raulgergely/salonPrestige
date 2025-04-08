<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function accessDenied()
    {
        return view('errors.access_denied');  // View for restricted access
    }
    public function notFound()
    {
        return view('errors.404');  // Vei redirecționa către view-ul customizat 404
    }
}
