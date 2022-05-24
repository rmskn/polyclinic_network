<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property int $user_id;
 * @property float $weight;
 * @property float $height;
 */
class UserAddition extends Model
{
    use HasFactory;

    public function userAddition()
    {
        return $this->belongsTo(User::class);
    }
}
