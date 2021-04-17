<?php

namespace App\Http\Responses\Frontend\Career;

use App\Models\Opportunity;
use Illuminate\Contracts\Support\Responsable;

class CareerFormResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        return view("web.pages.CareerForm")->with([
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
            ->with(['question' => function($query){
                $query->select('*')
                    ->with('answer');
            }])
            ->where('opportunity_id', $this->id)
            ->first();
    }
}
