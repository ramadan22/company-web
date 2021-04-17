<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\Frontend\Career\CareerResponse;
use App\Http\Responses\Frontend\Career\CareerFormResponse;
use App\Http\Responses\Frontend\Career\CareerApplyResponse;

class CareerController extends Controller
{
    public function __invoke()
    {
        return new CareerResponse;
    }

    public function form(Request $request, $id)
    {
        return new CareerFormResponse($id);
    }

    public function apply(Request $request)
    {
        return new CareerApplyResponse;
    }
}
