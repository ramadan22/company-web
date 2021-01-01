<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;

class BannerEditResponse
{
    public function toResponse($id)
    {
        $data = Banner::where('banner_id', $id)->first();

        return view('admin.pages.banner.edit')->with([
            'title' => 'Edit Data Banner',
            'data' => $data
        ]);
    }
}
