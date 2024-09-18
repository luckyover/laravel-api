<?php

namespace App\Http\Resources;

use App\Models\ResponseResource;

class CommonResource extends ResponseResource
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

}
