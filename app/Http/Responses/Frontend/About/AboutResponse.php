<?php

namespace App\Http\Responses\Frontend\About;

use App\Models\About;
use Illuminate\Contracts\Support\Responsable;

class AboutResponse implements Responsable
{
    public function toResponse($request)
    {
        $about = About::first();

        return view("web.pages.AboutView")->with([
            'data' => $about,
            'title' => 'About us'
        ]);
    }
}
