<?php

namespace App\Repo;

use App\Models\Appointment;

class AppointmentRepo
{
    public function getAppointment($id, $name, $service)
    {
        return Appointment::where('_id', $id)
            ->where('name', $name)
            ->where('service', $service)
            ->first();  // returnează primul rezultat c
    }

    public function updateAppointment($appointment, $date, $hour, $status)
    {
        $appointment->update([
            'status' => $status,
            'date' => $date,
            'hour' => $hour
        ]);
    }
    public function getAllPendingAppointments()
    {
        return Appointment::where('status', 'pending')->get();
    }
    public function getAllConfirmedAppointments()
    {
        return Appointment::where('status', 'confirmed')->get();
    }
    public function getAllFinishedAppointments()
    {
        return Appointment::where('status', 'finished')->get();
    }
}
