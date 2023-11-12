<?php

namespace App\Service;

use App\Repositories\User\UserRepositoryInterface;

class UserService
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository=$userRepository;
    }

    public function get(array $params=[]){
        return $this->userRepository->get($params);
    }
}
