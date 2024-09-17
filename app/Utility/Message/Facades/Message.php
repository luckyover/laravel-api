<?php
namespace App\Utility\Message\Facades;

use Illuminate\Support\Facades\Facade;

class Message extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \App\Utility\Message\Messages::class;
    }
}
