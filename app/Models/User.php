<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property string $first_name;
 * @property string $last_name;
 * @property string $login;
 * @property string $password;
 * @property string $email;
 * @property string $phone;
 * @property DateTime $date_of_birth;
 * @property string $city;
 * @property int $access_level;
 */
class User extends Model
{
    use HasFactory;

    public function userAddition()
    {
        return $this->hasOne(UserAddition::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
