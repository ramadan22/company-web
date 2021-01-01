<?php

namespace App\Http\Responses\Backend\News;

use Illuminate\Contracts\Support\Responsable;

class NewsAddResponse implements Responsable
{
    public function toResponse($request)
    {
        return view("admin.pages.news.add")->with([
            'title' => 'Add New News'
        ]);
    }
}
