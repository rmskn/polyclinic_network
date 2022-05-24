<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property int $add_id;
 * @property string $title;
 * @property string $description;
 */
class AppointmentConclusion extends Model
{
    use HasFactory;

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'app_id');
    }
}
