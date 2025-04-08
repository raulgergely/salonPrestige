<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Repo\AppointmentRepo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $appointmentRepo = new AppointmentRepo();
        // Verificăm rolul utilizatorului și încărcăm datele corespunzătoare
        if ($user->role === 'admin') {
            // Date specifice pentru admin
            $orders = Order::all(); // Exemplu de date pentru admin
            return view('admin.dashboard', compact('orders'));
        } elseif ($user->role === 'receptionist') {
            // Date specifice pentru receptionist
            $appointmentsPending = $appointmentRepo->getAllPendingAppointments();
            $appointmentsConfirmed = $appointmentRepo->getAllConfirmedAppointments();
            $appointmentsFinished = $appointmentRepo->getAllFinishedAppointments();
            return view('receptionist.dashboard', compact('appointmentsPending', 'appointmentsConfirmed', 'appointmentsFinished'));
        } elseif ($user->role === 'user') {
            return view('user.dashboard');
        } elseif ($user->role === 'employee') {
            // Date specifice pentru employee
            $tasks = $user->tasks; // Exemplu de date pentru employee
            return view('employee.dashboard', compact('tasks'));
        }

        // Dacă nu se potrivește niciun rol
        return redirect()->route('home');
    }
}
