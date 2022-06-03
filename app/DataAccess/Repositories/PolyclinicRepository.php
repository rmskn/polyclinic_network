<?php

namespace App\DataAccess\Repositories;

use App\Models\Polyclinic;

class PolyclinicRepository
{
    public function getPolyclinicsByCity(string $city)
    {
        return Polyclinic::query()
            ->select('*')
            ->where('city', $city)
            ->get();
    }
}
