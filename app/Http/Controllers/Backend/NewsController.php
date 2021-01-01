<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// responses
use App\Http\Responses\Backend\News\NewsResponse;
use App\Http\Responses\Backend\News\NewsAddResponse;
use App\Http\Responses\Backend\News\NewsCreateResponse;
use App\Http\Responses\Backend\News\NewsEditResponse;
use App\Http\Responses\Backend\News\NewsUpdateResponse;
use App\Http\Responses\Backend\News\NewsDeleteResponse;

class NewsController extends Controller
{
    public function index()
    {
        return new NewsResponse;
    }

    public function add()
    {
        return new NewsAddResponse;
    }

    public function create(Request $request)
    {
        return new NewsCreateResponse;
    }

    public function edit($id)
    {
        return new NewsEditResponse($id);
    }

    public function update(Request $request, $id)
    {
        return new NewsUpdateResponse($id);
    }

    public function delete($id)
    {
        return new NewsDeleteResponse($id);
    }
}
