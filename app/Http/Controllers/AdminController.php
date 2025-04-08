<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function createUserFromAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Va verifica și câmpul confirm-password
            'confirm-password-your-account' => 'required|string|min:8',
            'account_type' => 'required|in:receptionist,admin,employee',
            'employee_role' => 'nullable|in:manager,staff,intern', // Doar pentru angajați
        ]);
        $userData = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->account_type,
        ];

        if ($request->account_type === 'employee') {
            $userData['employee_role'] = $request->employee_role;
        }
        User::create($userData);
    }
}
