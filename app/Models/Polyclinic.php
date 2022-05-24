<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property string $title;
 * @property string $city;
 * @property string $address;
 * @property string $phone;
 * @property string $email;
 * @property string $working_hours;
 */
class Polyclinic extends Model
{
    use HasFactory;

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
