<?php

namespace App\DataAccess\Repositories;

use App\Models\Appointment;
use DateTime;

class AppointmentRepository
{
    private DoctorRepository $doctorRepository;

    /**
     * @param DoctorRepository $doctorRepository
     */
    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function getByDateAndDoctor(DateTime $date, int $doctorId)
    {
        $beforeDate = $date->format('Y-m-d');
        $afterDate = $date->modify('+1 day')->format('Y-m-d');

        return Appointment::query()
            ->select('*')
            ->where('doctor_id', $doctorId)
            ->whereBetween('date', [$beforeDate, $afterDate])
            ->get();
    }

    public function create(int $userId, int $doctorId, DateTime $date): int|false
    {
        $appointment = new Appointment();

        $appointment->doctor_id = $doctorId;
        $appointment->user_id = $userId;
        $appointment->date = $date;
        $appointment->app_status = 0;

        $result = $appointment->save();

        if ($result) {
            return $appointment->id;
        }

        return false;
    }

    public function getAppointmentsArrayByParametrs(
        int $userId,
        DateTime $startDate,
        DateTime $endDate,
        ?int $polyclinicId,
        ?int $specId
    ) {
        $beforeDate = $startDate->format('Y-m-d');
        $afterDate = $endDate->modify('+1 day')->format('Y-m-d');

        $query = Appointment::query()
            ->select('id', 'doctor_id', 'total_price', 'date', 'cabinet', 'app_status')
            ->whereBetween('date', [$beforeDate, $afterDate])
            ->where('user_id', $userId);

        if (($polyclinicId === null) && ($specId !== null)) {
            $doctors = $this->doctorRepository->getDoctorsIdBySpec($specId)->toArray();
            $query = $query->whereIn('doctor_id', $doctors);
        } elseif (($polyclinicId !== null) && ($specId === null)) {
            $doctors = $this->doctorRepository->getDoctorsIdByPolyclinic($polyclinicId)->toArray();
            $query = $query->whereIn('doctor_id', $doctors);
        } elseif (($polyclinicId !== null) && ($specId !== null)) {
            $doctorsBySpec = $this->doctorRepository->getDoctorsIdBySpec($specId)->toArray();
            $doctorsByPolyclinic = $this->doctorRepository->getDoctorsIdByPolyclinic($polyclinicId)->toArray();
            $query = $query->whereIn('doctor_id', $doctorsBySpec);
            $query = $query->whereIn('doctor_id', $doctorsByPolyclinic);
        }

        return $query->get();
    }

}
