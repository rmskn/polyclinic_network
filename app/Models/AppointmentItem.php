<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property int $add_id;
 * @property int $doc_service_id;
 * @property string $description;
 * @property float $price;
 */
class AppointmentItem extends Model
{
    use HasFactory;

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'app_id');
    }

    public function doctorService()
    {
        return $this->belongsTo(DoctorService::class, 'doc_service_id');
    }

    public function analysis()
    {
        return $this->hasMany(Analysis::class);
    }
}
