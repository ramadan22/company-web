<?php

namespace App\Http\Responses\Frontend\Career;

use App\Models\Opportunity;
use Illuminate\Contracts\Support\Responsable;

class CareerResponse implements Responsable
{
    public function toResponse($request)
    {
        return view("web.pages.CareerView")->with([
            'title' => 'Career',
            'data' => $this->data($request)
        ]);
    }

    protected function data($request)
    {
        return Opportunity::query()
            ->select('*')
            ->selectRaw("
                if(image is null or image = '', null,
                CONCAT('".asset('storage/opportunity')."/',
                image)) as image"
            )
            ->paginate();
    }
}
