<?php

namespace App\Http\Resources;

use App\Models\ResponseResource;

class LoginResource extends ResponseResource
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

}
