<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Repo\AppointmentRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointmentServices = 0;
        return view('apointment', compact('appointmentServices')); // Asigură-te că ai fișierul resources/views/dashboard.blade.php
    }

    public function createApointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:10|max:15',
            'service' => 'required|string|max:255',
            'date' => 'required|date_format:d-m-Y|after_or_equal:today',
            'hour' => 'required|string|in:08:00-10:00,11:00-12:00,14:00-16:00,17:00-19:00',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $date = \Carbon\Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');

        Appointment::create([
            'user_id' => Auth::id() ?? null, // Preluăm utilizatorul autentificat
            'name' => $request->name,
            'phone' => $request->phone,
            'service' => $request->service,
            'date' => $date,
            'hour' => $request->hour,
            'status' => 'pending', // Inițial, programarea nu este confirmată
        ]);

        return redirect()->back()->with('success', 'Programarea a fost efectuată cu succes! Veți fi contactat pentru confirmare.');
    }

    public function setAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'regex:/^[a-fA-F0-9]{24}$/'],
            'name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'hour' => 'required|date_format:H:i',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $appointmentRepo = new AppointmentRepo();
        $appointment = $appointmentRepo->getAppointment($request->id, $request->name, $request->service);
        if ($appointment) {
            $appointmentRepo->updateAppointment($appointment, $request->date, $request->hour, 'confirmed');
        }
        return redirect()->back();
    }

    public function finishAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'regex:/^[a-fA-F0-9]{24}$/'],
            'name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'hour' => 'required|date_format:H:i',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $appointmentRepo = new AppointmentRepo();
        $appointment = $appointmentRepo->getAppointment($request->id, $request->name, $request->service);
        if ($appointment) {
            $appointmentRepo->updateAppointment($appointment, $request->date, $request->hour, 'finished');
        }
        return redirect()->back();
    }
    public function removeAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'regex:/^[a-fA-F0-9]{24}$/'],
            'name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'hour' => [
                'required',
                'regex:/^([01]?[0-9]|2[0-3]):([0-5][0-9])(-([01]?[0-9]|2[0-3]):([0-5][0-9]))?$/'
            ],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $appointmentRepo = new AppointmentRepo();
        $appointment = $appointmentRepo->getAppointment($request->id, $request->name, $request->service);
        if ($appointment) {
            $appointment->delete();
        }
        return redirect()->back();
    }

    public function dayMakeup()
    {
        $appointmentServices = 0;
        return view('apointment', compact('appointmentServices'));
    }
    public function nightMakeup()
    {
        $appointmentServices = 1;
        return view('apointment', compact('appointmentServices'));
    }
    public function eventMakeup()
    {
        $appointmentServices = 2;
        return view('apointment', compact('appointmentServices'));
    }
    public function eyelashExtensions()
    {
        $appointmentServices = 3;
        return view('apointment', compact('appointmentServices'));
    }
    public function eyebrowLamination()
    {
        $appointmentServices = 4;
        return view('apointment', compact('appointmentServices'));
    }
    public function lipMicropigmentation()
    {
        $appointmentServices = 5;
        return view('apointment', compact('appointmentServices'));
    }
    public function eyebrowShapingLaminationTinting()
    {
        $appointmentServices = 6;
        return view('apointment', compact('appointmentServices'));
    }

}
