<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakeupController extends Controller
{
    public function aboutMakeup()
    {
        return view('aboutMakeup'); // Asigură-te că ai fișierul resources/views/dashboard.blade.php
    }
}
