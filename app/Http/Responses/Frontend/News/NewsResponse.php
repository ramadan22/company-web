<?php

namespace App\Http\Responses\Frontend\News;

use App\Models\News;
use Illuminate\Contracts\Support\Responsable;

class NewsResponse implements Responsable
{
    public function toResponse($request)
    {
        $news = News::paginate(10);

        return view("web.pages.NewsView")->with([
            'title' => 'News',
            'data' => (object) [
                'news' => $news
            ]
        ]);
    }
}
