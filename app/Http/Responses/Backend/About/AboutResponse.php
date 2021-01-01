<?php

namespace App\Http\Responses\Backend\About;

use App\Models\About;

class AboutResponse
{
    public function toResponse()
    {
        $about = About::first();

        return view("admin.pages.about.index")->with([
            'data' => $about,
            'title' => 'About us'
        ]);
    }
}
