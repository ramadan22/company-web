<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;

class BannerAddResponse
{
    public function toResponse()
    {
        return view('admin.pages.banner.add')->with([
            'title' => 'Add Banner'
        ]);
    }
}
