<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view("web.page.HomeView")->with([
            'title' => 'Home',
            'view' => 'HomeView'
        ]);
    }
}
