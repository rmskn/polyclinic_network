<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property string $title;
 */
class AppointmentStatus extends Model
{
    use HasFactory;

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
