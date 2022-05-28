<?php

namespace App\Http\Controllers;

use App\DataAccess\Repositories\DoctorRepository;
use App\Services\DoctorService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private DoctorRepository $doctorRepository;
    private DoctorService $doctorService;

    /**
     * @param DoctorRepository $doctorRepository
     * @param DoctorService $doctorService
     */
    public function __construct(DoctorRepository $doctorRepository, DoctorService $doctorService)
    {
        $this->doctorRepository = $doctorRepository;
        $this->doctorService = $doctorService;
    }


    public function getDoctorsByPolyclinic(Request $request)
    {
        $polyclinicId = (int)$request['polyclinicId'];

        $doctors = $this->doctorRepository->getDoctorsByPolyclinic($polyclinicId)->toArray();
        $doctorsWithNames = $this->doctorService->insertNamesToDoctorsArray($doctors);

        return json_encode($doctorsWithNames, JSON_THROW_ON_ERROR);
    }
}
