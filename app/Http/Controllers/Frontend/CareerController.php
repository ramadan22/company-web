<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\Frontend\Career\CareerResponse;

class CareerController extends Controller
{
    public function __invoke()
    {
        return new CareerResponse;
    }
}
