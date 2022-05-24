<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property int $user_id;
 * @property int $doctor_id;
 * @property float $total_price;
 * @property DateTime $date;
 * @property int $cabinet;
 * @property int $app_status;
 */
class Appointment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function status()
    {
        return $this->belongsTo(AppointmentStatus::class, 'app_status');
    }

    public function appointmentConclusion()
    {
        return $this->hasMany(AppointmentConclusion::class);
    }
}
