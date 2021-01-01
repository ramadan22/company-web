<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;
use Illuminate\Contracts\Support\Responsable;

class BannerAddResponse implements Responsable
{
    public function toResponse($request)
    {
        return view('admin.pages.banner.add')->with([
            'title' => 'Add Banner'
        ]);
    }
}
