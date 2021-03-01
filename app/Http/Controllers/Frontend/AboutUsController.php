<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Helpers\HttpHelper;

class AboutUsController extends Controller
{
    public function __invoke()
    {
        $api = new HttpHelper();
        $response = $api->get("/api/about");
        return view("web.page.AboutView")->with([
            'title' => 'About Us',
            'view' => 'AboutView',
            'data' => $response
        ]);
    }
}
