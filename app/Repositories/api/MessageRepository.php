<?php

namespace App\Repositories\api;

use App\Repositories\MessageInterface;
use App\Models\Message;
class MessageRepository implements MessageInterface
{

    /**
     * find Message
     *
     * @param message_cd
     * @return Collect
     */
    public function find($message_cd){
        return Message::where('message_cd', $message_cd)->pluck('message_nm')->first();
    }
}
