<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// response
use App\Http\Responses\Backend\About\AboutResponse;
use App\Http\Responses\Backend\About\AboutSaveResponse;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->aboutResponse = new AboutResponse;
        $this->aboutSaveResponse = new AboutSaveResponse;
    }

    public function index()
    {
        return $this->aboutResponse
            ->toResponse();
    }

    public function save(Request $request)
    {
        return $this->aboutSaveResponse
            ->toResponse($request);
    }
}
