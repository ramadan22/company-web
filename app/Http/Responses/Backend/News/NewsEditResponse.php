<?php

namespace App\Http\Responses\Backend\News;

use App\Models\News;
use Illuminate\Contracts\Support\Responsable;

class NewsEditResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $news = News::where('news_id', $this->id)->firstOrFail();

        return view("admin.pages.news.edit")->with([
            'data' => $news,
            'title' => 'Edit Data News'
        ]);
    }
}
