<?php

namespace App\DataAccess\Repositories;

use App\Models\UserAddition;

class UserAdditionRepository
{
    public function getByUserId(int $userId)
    {
        return UserAddition::query()
            ->select('*')
            ->where('user_id', $userId)
            ->get();
    }

    public function update(int $userId, float $weight, float $height)
    {
        $user = UserAddition::query()
        ->where('user_id', $userId)
        ->update(['weight' => $weight, 'height' => $height]);
    }
}
