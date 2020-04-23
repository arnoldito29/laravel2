<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Collection;

class UserService
{
    const LIMIT = 10;

    /**
     * UserService constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param string $requestData
     * @return Collection
     */
    public function searchUsers(string $requestData): Collection
    {
        $users = $this->user::where('email', 'like', $requestData . '%')
            ->limit(self::LIMIT)
            ->get();

        return $users;
    }
}
