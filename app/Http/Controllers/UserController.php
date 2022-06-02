<?php

namespace App\Http\Controllers;

use App\DataAccess\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'login' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'phone' => 'required|max:11',
            'city' => 'required|string',
            'dateOfBirth' => 'required|string',
            'device_name' => 'required|string'
        ]);

        if (!$this->userRepository->checkUniquePhone($validated['phone'])) {
            return json_encode(['result' => 'failed', 'error' => 'phone is already in use'], JSON_THROW_ON_ERROR);
        }

        if (!$this->userRepository->checkUniqueLogin($validated['login'])) {
            return json_encode(['result' => 'failed', 'error' => 'login is already taken'], JSON_THROW_ON_ERROR);
        }

        if (!$this->userRepository->checkUniqueEmail($validated['email'])) {
            return json_encode(['result' => 'failed', 'error' => 'email is already in use'], JSON_THROW_ON_ERROR);
        }

        $userId = $this->userRepository->createUser(
            $validated['firstName'],
            $validated['lastName'],
            $validated['phone'],
            $validated['dateOfBirth'],
            $validated['login'],
            $validated['email'],
            $validated['password'],
            $validated['city'],
        );

        if ($userId === null) {
            return json_encode(
                ['result' => 'failed', 'error' => 'failed to add user to database'],
                JSON_THROW_ON_ERROR
            );
        }

        $user = User::query()->find($userId);

        $token = $user->createToken($validated['device_name'])->plainTextToken;

        return json_encode([
            'result' => 'success',
            'token' => $token,
            'userId' => $userId
        ], JSON_THROW_ON_ERROR);
    }

    public function getUserInfo(Request $request)
    {
        $userId = $request->user()->id;

        $info = $this->userRepository->getUserArrayByIdWithAdditions($userId);

        return json_encode($info, JSON_THROW_ON_ERROR);
    }

    public function updateUserInfo(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'phone' => 'required|max:11',
            'city' => 'required|string',
            'additions' => 'required|json'
        ]);

        $userId = $request->user()->id;

        if (!$this->userRepository->checkUniqueEmail($validated['email'])
            && !$this->userRepository->checkUniquePhone($validated['phone'])) {
            $result = $this->userRepository->updateUserWithAdditions(
                $userId,
                $validated['email'],
                $validated['password'],
                $validated['phone'],
                $validated['city'],
                json_decode($validated['additions'], true, 512, JSON_THROW_ON_ERROR)
            );

            if ($result) {
                return json_encode(['result' => 'Success'], JSON_THROW_ON_ERROR);
            }
            return json_encode(['error' => 'Failed to update database'], JSON_THROW_ON_ERROR);
        }

        return json_encode(['error' => 'Dont unique data'], JSON_THROW_ON_ERROR);
    }
}
