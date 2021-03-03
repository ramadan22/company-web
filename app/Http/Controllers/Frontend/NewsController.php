<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Http\Traits\ApiService;

class NewsController extends Controller
{
    public function __invoke()
    {
        // $newsList = $this->apiGateway('api/news', 'GET');

        // echo "<pre>";
        //     print_r($newsList);die();

        return view("web.pages.NewsView")->with([
            'title' => 'News',
            'view' => 'NewsView'
        ]);
    }
}
