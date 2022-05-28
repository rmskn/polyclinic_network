<?php

namespace App\Http\Controllers;

use App\DataAccess\Repositories\PolyclinicRepository;
use Illuminate\Http\Request;

class PolyclinicController extends Controller
{
    private PolyclinicRepository $polyclinicRepository;

    /**
     * @param PolyclinicRepository $polyclinicRepository
     */
    public function __construct(PolyclinicRepository $polyclinicRepository)
    {
        $this->polyclinicRepository = $polyclinicRepository;
    }

    public function getPolyclinicsByCity(Request $request)
    {
        $city = $request->user()->city;

        $polyclinics = $this->polyclinicRepository->getPolyclinicsByCity($city)->toArray();

        return json_encode($polyclinics, JSON_THROW_ON_ERROR);
    }
}
