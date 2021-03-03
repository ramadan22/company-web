<?php

namespace App\Http\Responses\Frontend\Home;

use App\Models\Banner;
use Illuminate\Contracts\Support\Responsable;

class HomeResponse implements Responsable
{
    public function toResponse($request)
    {
        $banner = Banner::get();

        return view("web.pages.HomeView")->with([
            'title' => 'Homepage',
            'data' => (object) [
                'banner' => $banner
            ]
        ]);
    }
}
