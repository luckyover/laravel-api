<?php

namespace App\Exceptions;

use Exception;

class StoreException extends Exception
{
    protected $data;

    public function __construct($message = "", $code = 0, Exception $previous = null, $data = null)
    {
        parent::__construct($message, $code, $previous);
        $this->data = $data;
    }

    public function getCustomData()
    {
        return $this->data;
    }
}
