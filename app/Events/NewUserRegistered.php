<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewUserRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $roleId;

    public function __construct(User $user, $roleId)
    {
        $this->user = $user;
        $this->roleId = $roleId;
    }
}
