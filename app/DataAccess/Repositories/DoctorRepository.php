<?php

namespace App\DataAccess\Repositories;

use App\Models\Doctor;
use PhpParser\Comment\Doc;

class DoctorRepository
{
    public function __construct()
    {
    }

    public function getDoctorsByPolyclinic(int $polyclinicId)
    {
        return Doctor::query()
            ->select('*')
            ->where('polyclinic_id', $polyclinicId)
            ->get();
    }

    public function getWorkingTime(int $doctorId)
    {
        return Doctor::query()
            ->select('*')
            ->where('id', $doctorId)
            ->get();
    }

    public function getDoctorsIdBySpec(int $specId)
    {
        return Doctor::query()
            ->select('id')
            ->where('spec_id', $specId)
            ->get();
    }

    public function getDoctorsIdByPolyclinic(int $polyclinicId)
    {
        return Doctor::query()
            ->select('id')
            ->where('polyclinic_id', $polyclinicId)
            ->get();
    }
}
