<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;

class BannerResponse
{
    public function toResponse()
    {
        $data = Banner::query()
            ->select('banner_title', 'banner_id')
            ->selectRaw('substring(banner_description, 1, 40) as banner_description')
            ->selectRaw("
                if(banner_image is null or banner_image = '', null,
                CONCAT('".asset('public/storage/banner')."/',
                banner_image)) as banner_image"
            )
            ->paginate(10);

        return view('admin.pages.banner.index')->with([
            'title' => 'Banner',
            'data' => $data
        ]);
    }
}
