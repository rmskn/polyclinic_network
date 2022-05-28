<?php

namespace App\DataAccess\Repositories;

use App\Models\TimeAppointment;

class TimeAppointmentRepository
{
    public function getAll()
    {
        return TimeAppointment::all();
    }
}
