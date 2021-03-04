<?php

namespace App\Http\Responses\Frontend\News;

use App\Models\News;
use Illuminate\Contracts\Support\Responsable;

class NewsResponse implements Responsable
{
    public function toResponse($request)
    {
        $news = $this->news();

        return view("web.pages.NewsView")->with([
            'title' => 'News',
            'data' => (object) [
                'news' => $news
            ]
        ]);
    }

    public function news()
    {
        return News::query()
            ->select('news_id', 'news_title')
            ->selectRaw('substring(news_content, 1, 200) as news_content')
            ->selectRaw("
                if(news_image is null or news_image = '', null,
                CONCAT('".asset('storage/news/thumbnail')."/',
                news_image)) as news_image"
            )
            ->paginate(10);
    }
}
