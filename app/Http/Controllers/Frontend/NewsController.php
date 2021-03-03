<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responses\Frontend\News\NewsResponse;

class NewsController extends Controller
{
    public function __invoke()
    {
        return new NewsResponse;
    }
}
