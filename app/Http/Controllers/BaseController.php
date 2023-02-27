<?php

namespace App\Http\Controllers;

use App\Http\Service\Post\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service )
    {
        $this->service = $service;
    }
}
