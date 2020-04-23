<?php

namespace App\Services;

use App\Models\Message;
use App\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MessageService
{
    const PAGE_LIMIT = 10;

    /**
     * MessageService constructor.
     * @param Message $message
     * @param UserService $userService
     */
    public function __construct(Message $message, UserService $userService)
    {
        $this->message = $message;
        $this->userService = $userService;
    }

    /**
     * @param array $requestData
     * @return bool
     */
    public function store(array $requestData): bool
    {
        $sender = $this->userService->searchUsers($requestData['sender'])->first();
        $receiver = $this->userService->searchUsers($requestData['receiver'])->first();
        $message = new Message();
        $message->sender_id = $sender->id;
        $message->receiver_id = $receiver->id;
        $message->message = $requestData['message'];

        return $message->save();
    }

    /**
     * @param User $user
     * @return LengthAwarePaginator
     */
    public function getAllUserMessages(User $user): LengthAwarePaginator
    {
        $messages = $this->message::with('sender', 'receiver')
            ->where('receiver_id', $user->id)
            ->paginate(self::PAGE_LIMIT);

        return $messages;
    }

    /**
     * @param User $user
     * @return LengthAwarePaginator
     */
    public function getAllSenderUserMessages(User $user): LengthAwarePaginator
    {
        $messages = $this->message::with('sender', 'receiver')
            ->where('sender_id', $user->id)
            ->paginate(self::PAGE_LIMIT);

        return $messages;
    }
}
