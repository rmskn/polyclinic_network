<?php

namespace App\DataAccess\Repositories;

use App\Models\AppointmentItem;

class AppointmentItemRepository
{
    public function getAppointmentItems(int $appId)
    {
        return AppointmentItem::query()
            ->select('*')
            ->where('app_id', $appId)
            ->get();
    }
}
