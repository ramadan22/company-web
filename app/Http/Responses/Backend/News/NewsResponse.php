<?php

namespace App\Http\Responses\Backend\News;

use App\Models\News;
use Illuminate\Contracts\Support\Responsable;

class NewsResponse implements Responsable
{
    public function toResponse($request)
    {
        $news = News::query()
            ->select('*')
            ->selectRaw("
                if(news_image is null or news_image = '', null,
                CONCAT('".asset('storage/news/thumbnail')."/',
                news_image)) as news_image"
            )
            ->paginate(10);

        return view("admin.pages.news.index")->with([
            'data' => $news,
            'title' => 'News'
        ]);
    }
}
