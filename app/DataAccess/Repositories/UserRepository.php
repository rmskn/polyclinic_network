<?php

namespace App\DataAccess\Repositories;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    private UserAdditionRepository $userAdditionRepository;

    /**
     * @param UserAdditionRepository $userAdditionRepository
     */
    public function __construct(UserAdditionRepository $userAdditionRepository)
    {
        $this->userAdditionRepository = $userAdditionRepository;
    }

    public function getFirstNameById(int $userId)
    {
        return User::query()
            ->select('first_name')
            ->where('id', $userId)
            ->first();
    }

    public function getLastNameById(int $userId)
    {
        return User::query()
            ->select('last_name')
            ->where('id', $userId)
            ->first();
    }

    public function getUserArrayByIdWithAdditions(int $id)
    {
        $user = User::query()->find($id)->toArray();
        $user['additions'] = $this->userAdditionRepository->getByUserId($id)->toArray();

        return $user;
    }

    public function checkUniqueEmail(string $email): bool
    {
        $query = User::query()
            ->select('*')
            ->where('email', $email)
            ->get();

        return $query === null;
    }

    public function checkUniquePhone(string $phone): bool
    {
        $query = User::query()
            ->select('*')
            ->where('phone', $phone)
            ->get();

        return $query === null;
    }

    public function updateUserWithAdditions(
        int $userId,
        string $email,
        string $password,
        string $phone,
        string $city,
        array $additions
    ) {
        try {
            DB::beginTransaction();

            $user = User::query()->find($userId);
            $user['email'] = $email;
            $user['password'] = Hash::make($password);
            $user['phone'] = $phone;
            $user['city'] = $city;

            $this->userAdditionRepository->update($userId, $additions['weight'], $additions['height']);

            $user->save();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return false;
        }

        return true;
    }
}
