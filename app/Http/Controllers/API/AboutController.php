<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// response
use App\Http\Responses\API\About\AboutResponse;

class AboutController extends Controller
{
    public function __invoke(Request $request)
    {
        return new AboutResponse;
    }
}
