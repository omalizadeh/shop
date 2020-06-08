<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use App\Repositories\Interfaces\UserRepositoryInterface;

class AssignRoleToNewUser
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(NewUserRegistered $event)
    {
        $this->userRepository->assignRole($event->user, $event->roleId);
    }
}
