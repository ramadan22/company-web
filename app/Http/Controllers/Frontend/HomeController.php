<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view("index")->with([
            'title' => 'Homepage'
        ]);
    }
}
