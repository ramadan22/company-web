<?php

namespace App\Http\Responses\Frontend\Home;

use App\Models\Banner;
use Illuminate\Contracts\Support\Responsable;

class HomeResponse implements Responsable
{
    public function toResponse($request)
    {
        $banner = $this->banner();

        return view("web.pages.HomeView")->with([
            'title' => 'Homepage',
            'data' => (object) [
                'banner' => $banner
            ]
        ]);
    }

    protected function banner()
    {
        return Banner::query()
           ->select('banner_title', 'banner_id', 'banner_description')
           ->selectRaw("
               if(banner_image is null or banner_image = '', null,
               CONCAT('".asset('storage/banner')."/',
               banner_image)) as banner_image"
           )
           ->paginate(10);
    }
}
