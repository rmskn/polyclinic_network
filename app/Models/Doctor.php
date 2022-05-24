<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property int $polyclinic_id;
 * @property int $user_id;
 * @property int $spec_id;
 * @property string $additional_specializations;
 * @property string $work_phone;
 * @property string $working_hours;
 */
class Doctor extends Model
{
    use HasFactory;

    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'spec_id');
    }

    public function doctorService()
    {
        return $this->hasMany(DoctorService::class);
    }
}
