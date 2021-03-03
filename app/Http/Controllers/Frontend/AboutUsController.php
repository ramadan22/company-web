<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Responses\Frontend\About\AboutResponse;

class AboutUsController extends Controller
{
    public function __invoke()
    {
        return new AboutResponse;
    }
}
