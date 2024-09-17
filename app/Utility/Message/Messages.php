<?php

namespace App\Utility\Message;
use App\Repositories\MessageInterface as MessageRepository;

class Messages
{
    private $message_repo;

    public function __construct(MessageRepository $message_repo)
    {
        $this->message_repo = $message_repo;
    }

    public function find(Int $id)
    {
        return $this->message_repo->find($id);
    }



}
