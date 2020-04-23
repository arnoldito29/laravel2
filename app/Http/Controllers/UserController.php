<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     */
    public function search(Request $request)
    {
        $search = $request->input('term', '');
        UserResource::withoutWrapping();
        $users = $this->userService->searchUsers($search);

        return UserResource::collection($users);
    }
}
