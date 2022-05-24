<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property DateTime $time;
 */
class TimeAppointment extends Model
{
    use HasFactory;
}
