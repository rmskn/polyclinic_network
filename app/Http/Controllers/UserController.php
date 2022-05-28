<?php

namespace App\Http\Controllers;

use App\DataAccess\Repositories\UserRepository;
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
