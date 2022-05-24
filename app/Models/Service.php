<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property int $spec_id;
 * @property string $title;
 * @property string $description;
 * @property float $price;
 * @property float $duration;
 */
class Service extends Model
{
    use HasFactory;

    public function doctorService()
    {
        return $this->hasMany(DoctorService::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'spec_id');
    }
}
