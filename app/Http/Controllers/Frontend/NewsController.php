<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responses\Frontend\News\NewsResponse;
use App\Http\Responses\Frontend\News\NewsDetailResponse;

class NewsController extends Controller
{
    public function index()
    {
        return new NewsResponse;
    }

    public function detail(Request $request, $id)
    {
        return new NewsDetailResponse($id);
    }
}
