<?php

namespace App\Http\Controllers;

use App\Services\YesNoService;

class ApiController
{
    public function index(YesNoService $service)
    {
        return response()->json($service->getAnswer());
    }
}