<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// response
use App\Http\Responses\Backend\Activity\ActivityResponse;

class ActivityController extends Controller
{
    public function __invoke()
    {
        return new ActivityResponse;
    }
}
