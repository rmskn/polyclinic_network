<?php

namespace App\Http\Controllers;

use App\DataAccess\Repositories\AppointmentRepository;
use App\Services\AppointmentService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AppointmentController extends Controller
{
    private AppointmentRepository $appointmentRepository;
    private AppointmentService $appointmentService;

    /**
     * @param AppointmentRepository $appointmentRepository
     * @param AppointmentService $appointmentService
     */
    public function __construct(AppointmentRepository $appointmentRepository, AppointmentService $appointmentService)
    {
        $this->appointmentRepository = $appointmentRepository;
        $this->appointmentService = $appointmentService;
    }

    public function getAvailableTimeToAppointment(Request $request)
    {
        $doctorId = $request['doctorId'];
        $date = DateTime::createFromFormat('Y-m-d', $request['date']);

        $doctorAppointments = $this->appointmentRepository->getByDateAndDoctor($date, $doctorId)->toArray();

        $freeTime = $this->appointmentService->calculateFreeTime($doctorAppointments);

        if ($freeTime === []) {
            return Response::json([
                'error' => 'No free places'
            ], 400);
        }

        return json_encode($freeTime, JSON_THROW_ON_ERROR);
    }

    public function createAppointment(Request $request)
    {
        $doctorId = $request['doctorId'];
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $request['date']);
        $userId = $request->user()->id;

        $appId = $this->appointmentRepository->create($userId, $doctorId, $date);

        if ($appId === false) {
            return Response::json([
                'error' => 'Failed to register appointment'
            ], 400);
        }

        return json_encode(['appId' => $appId], JSON_THROW_ON_ERROR);
    }

    public function getHistoryOfAppointment(Request $request)
    {
        $userId = $request->user()->id;

        $appointments = $this->appointmentRepository->getAppointmentsArrayByParametrs(
            $userId,
            new DateTime($request['startDate']),
            new DateTime($request['endDate']),
            $validated['polyclinicId'] ?? null,
            $validated['specId'] ?? null
        );

        $appointments = $this->appointmentService->insertAppointmentItems($appointments->toArray());
        $appointments = $this->appointmentService->insertAppointmentConclusions($appointments);

        return json_encode($appointments, JSON_THROW_ON_ERROR);
    }
}
