<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    // 📌 Procesează autentificarea
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Email sau parolă incorectă.'])->withInput();
        }

        // Autentifică utilizatorul manual
        auth()->login($user);

        return redirect()->route('dashboard')->with('success', 'Autentificare reușită!');
    }

    // 📌 Afișează formularul de înregistrare

    // 📌 Procesează înregistrarea unui utilizator nou
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => "user",
        ]);
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Înregistrare reușită!');
    }

    public function specialRegister()
    {
        return view('specialRegister');
    }
    // 📌 Deconectare utilizator
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Te-ai deconectat cu succes.');
    }
}
