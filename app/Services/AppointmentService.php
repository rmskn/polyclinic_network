<?php

namespace App\Services;

use App\DataAccess\Repositories\AppointmentConclusionRepository;
use App\DataAccess\Repositories\AppointmentItemRepository;
use App\DataAccess\Repositories\TimeAppointmentRepository;
use DateTime;

class AppointmentService
{
    private TimeAppointmentRepository $timeAppointmentRepository;
    private AppointmentItemRepository $appointmentItemRepository;
    private AppointmentConclusionRepository $appointmentConclusionRepository;

    /**
     * @param TimeAppointmentRepository $timeAppointmentRepository
     * @param AppointmentItemRepository $appointmentItemRepository
     * @param AppointmentConclusionRepository $appointmentConclusionRepository
     */
    public function __construct(
        TimeAppointmentRepository $timeAppointmentRepository,
        AppointmentItemRepository $appointmentItemRepository,
        AppointmentConclusionRepository $appointmentConclusionRepository
    ) {
        $this->timeAppointmentRepository = $timeAppointmentRepository;
        $this->appointmentItemRepository = $appointmentItemRepository;
        $this->appointmentConclusionRepository = $appointmentConclusionRepository;
    }

    private function getTimeOfAppointment($appointment)
    {
        return (new DateTime($appointment['date']))->format('H:i:s');
    }

    private function getArrayOfTimes($appointments)
    {
        $array = [];
        foreach ($appointments as $appointment) {
            $array[] = $this->getTimeOfAppointment($appointment);
        }
        return $array;
    }

    public function calculateFreeTime(array $doctorAppointments)
    {
        $times = $this->timeAppointmentRepository->getAll()->toArray();

        $freeTime = [];

        $timesOfAppointments = $this->getArrayOfTimes($doctorAppointments);

        foreach ($times as $time) {
            if (!in_array($time['time'], $timesOfAppointments, true)) {
                $freeTime[] = $time['time'];
            }
        }

        return $freeTime;
    }

    public function insertAppointmentItems(array $appointments)
    {
        foreach ($appointments as &$appointment) {
            $appointment['items'] = $this->appointmentItemRepository->getAppointmentItems($appointment['id'])->toArray();
        }

        return $appointments;
    }

    public function insertAppointmentConclusions(array $appointments)
    {
        foreach ($appointments as &$appointment) {
            $appointment['conclusion'] = $this->appointmentConclusionRepository->getConclusionByAppointmentId($appointment['id'])->toArray();
        }

        return $appointments;
    }
}
