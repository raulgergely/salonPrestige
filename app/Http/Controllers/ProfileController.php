<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile'); // Asigură-te că ai fișierul resources/views/dashboard.blade.php
    }
}
