<?php

namespace App\Http\Responses\Frontend\Home;

use App\Models\Banner;
use App\Models\News;
use Illuminate\Contracts\Support\Responsable;

class HomeResponse implements Responsable
{
    public function toResponse($request)
    {
        $banner = $this->banner();
        $news = $this->news();

        return view("web.pages.HomeView")->with([
            'title' => 'Homepage',
            'data' => (object) [
                'banner' => $banner,
                'news' => $news
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

    public function news()
    {
        return News::query()
            ->select('news_id', 'news_title', 'news_content', 'created_at')
            // ->selectRaw('substring(news_content, 1, 200) as news_content')
            ->selectRaw("
                if(news_image is null or news_image = '', null,
                CONCAT('".asset('storage/news/thumbnail')."/',
                news_image)) as news_image"
            )
            ->paginate(10);
    }
}
