<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// response
use App\Http\Responses\Backend\About\AboutResponse;
use App\Http\Responses\Backend\About\AboutSaveResponse;

class AboutController extends Controller
{
    public function index()
    {
        return new AboutResponse;
    }

    public function save(Request $request)
    {
        return new AboutSaveResponse;
    }
}
