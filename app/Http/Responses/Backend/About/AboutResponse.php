<?php

namespace App\Http\Responses\Backend\About;

use App\Models\About;
use Illuminate\Contracts\Support\Responsable;

class AboutResponse implements Responsable
{
    public function toResponse($request)
    {
        $about = About::first();

        return view("admin.pages.about.index")->with([
            'data' => $about,
            'title' => 'About us'
        ]);
    }
}
