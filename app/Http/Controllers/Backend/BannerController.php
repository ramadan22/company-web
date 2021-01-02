<?php

namespace App\Http\Controllers\Backend;

use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// responses
use App\Http\Responses\Backend\Banner\BannerResponse;
use App\Http\Responses\Backend\Banner\BannerAddResponse;
use App\Http\Responses\Backend\Banner\BannerCreateResponse;
use App\Http\Responses\Backend\Banner\BannerEditResponse;
use App\Http\Responses\Backend\Banner\BannerUpdateResponse;
use App\Http\Responses\Backend\Banner\BannerDeleteResponse;

class BannerController extends Controller
{
    public function index()
    {
        return new BannerResponse;
    }

    public function add()
    {
        return new BannerAddResponse;
    }

    public function create(Request $request)
    {
        return new BannerCreateResponse;
    }

    public function edit($id)
    {
        return new BannerEditResponse($id);
    }

    public function update(Request $request, $id)
    {
        return new BannerUpdateResponse($id);
    }

    public function delete($id)
    {
        return new BannerDeleteResponse($id);
    }
}
