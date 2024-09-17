<?php
namespace App\Repositories;
interface MessageInterface
{

    /**
     * find Message
     *
     * @param  string $message_cd
     * @return Collect
     */
    public function find($message_cd);


}
