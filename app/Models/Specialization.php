<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property string $title;
 * @property string $description;
 */
class Specialization extends Model
{
    use HasFactory;

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
