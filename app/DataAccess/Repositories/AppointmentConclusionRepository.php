<?php

namespace App\DataAccess\Repositories;

use App\Models\AppointmentConclusion;

class AppointmentConclusionRepository
{
    public function getConclusionByAppointmentId(int $appId)
    {
        return AppointmentConclusion::query()
            ->select('*')
            ->where('app_id', $appId)
            ->get();
    }
}
