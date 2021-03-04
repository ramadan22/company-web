<?php

namespace App\Http\Responses\Frontend\News;

use App\Models\News;
use Illuminate\Contracts\Support\Responsable;

class NewsDetailResponse implements Responsable
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $news = $this->news();

        if(!$news) {
            return back()
                ->with('status', 'failed')
                ->with('message', $validate->message);
        }

        dd($news->toArray());

        // return view("web.pages.NewsView")->with([
        //     'title' => 'News',
        //     'data' => (object) [
        //         'news' => $news
        //     ]
        // ]);
    }


    public function news()
    {
        return News::query()
            ->select('news_id', 'news_title', 'news_content')
            ->selectRaw("
                if(news_image is null or news_image = '', null,
                CONCAT('".asset('storage/news/thumbnail')."/',
                news_image)) as news_image"
            )
            ->where('news_id', $this->id)
            ->firstOrFail();
    }
}
