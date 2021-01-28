<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// response
use App\Http\Responses\API\Banner\BannerResponse;

class BannerController extends Controller
{
    public function __invoke(Request $request)
    {
        return new BannerResponse;
    }
}
