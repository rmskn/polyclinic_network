<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property int $doctor_id;
 * @property int $service_id;
 */
class DoctorService extends Model
{
    use HasFactory;

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function appointmentItem()
    {
        return $this->hasMany(AppointmentItem::class);
    }
}
