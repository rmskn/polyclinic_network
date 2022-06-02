<?php

namespace App\DataAccess\Repositories;

use App\Models\User;
use DateTime;
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

    public function checkUniqueLogin(string $login): bool
    {
        $query = User::query()
            ->select('*')
            ->where('login', $login)
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

    public function createUser(
        string $firstName,
        string $lastName,
        string $phone,
        string $dateOfBirth,
        string $login,
        string $email,
        string $password,
        string $city,
    ):int|null {
        $user = new User();

        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->phone = $phone;
        $user->date_of_birth = new DateTime($dateOfBirth);
        $user->login = $login;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->city = $city;

        $user->save();

        $userId = $user->id;

        return $userId ?? null;
    }
}
