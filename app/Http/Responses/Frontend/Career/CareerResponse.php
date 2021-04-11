<?php

namespace App\Http\Responses\Frontend\Career;

use Illuminate\Contracts\Support\Responsable;

class CareerResponse implements Responsable
{
    public function toResponse($request)
    {
        return view("web.pages.CareerView")->with([
            'title' => 'CareerPage',
            'data' => (object) []
        ]);
    }
}
