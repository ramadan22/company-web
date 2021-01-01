<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// response
use App\Http\Responses\Backend\Dashboard\DashboardResponse;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return new DashboardResponse;
    }
}
