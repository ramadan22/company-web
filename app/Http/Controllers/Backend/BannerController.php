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
    public function __construct()
    {
        $this->bannerResponse = new BannerResponse;
        $this->bannerAddResponse = new BannerAddResponse;
        $this->bannerCreateResponse = new BannerCreateResponse;
        $this->bannerEditResponse = new BannerEditResponse;
        $this->bannerUpdateResponse = new BannerUpdateResponse;
        $this->bannerDeleteResponse = new BannerDeleteResponse;
    }

    public function index()
    {
        return $this->bannerResponse
            ->toResponse();
    }

    public function add()
    {
        return $this->bannerAddResponse
            ->toResponse();
    }

    public function create(Request $request)
    {
        return $this->bannerCreateResponse
            ->toResponse($request);
    }

    public function edit($id)
    {
        return $this->bannerEditResponse
            ->toResponse($id);
    }

    public function update(Request $request, $id)
    {
        return $this->bannerUpdateResponse
            ->toResponse($request, $id);
    }

    public function delete($id)
    {
        return $this->bannerDeleteResponse
            ->toResponse($id);
    }
}
