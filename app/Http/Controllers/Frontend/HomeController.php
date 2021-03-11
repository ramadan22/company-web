<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\Frontend\Home\HomeResponse;

class HomeController extends Controller
{
    public function __invoke()
    {
        return new HomeResponse;
    }
}
