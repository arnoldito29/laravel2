<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Services\MessageService;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * @var MessageService
     */
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $messages = $this->messageService->getAllUserMessages($request->user());

        return view('messages', compact('messages'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sent(Request $request)
    {
        $messages = $this->messageService->getAllSenderUserMessages($request->user());

        return view('messages', compact('messages'));
    }

    public function userMessages(User $user)
    {

    }

    public function show(Message $message)
    {

    }

    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $status = $this->messageService->store($requestData);

        return ['status' => $status];
    }

    public function update(Message $message)
    {

    }
}
