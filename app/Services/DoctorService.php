<?php

namespace App\Services;

use App\DataAccess\Repositories\UserRepository;

class DoctorService
{
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function insertNamesToDoctorsArray(array $doctors)
    {
        foreach ($doctors as &$doctor) {
            $doctor['name'] = [
                $this->userRepository->getFirstNameById($doctor['id']),
                $this->userRepository->getLastNameById($doctor['id'])
            ];
        }
        return $doctors;
    }
}
