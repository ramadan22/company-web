<?php

namespace App\Http\Responses\Backend\Opportunity;

use App\Models\Opportunity;
use Illuminate\Contracts\Support\Responsable;

class OpportunityEditResponse implements Responsable
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $data = $this->data();

        return view('admin.pages.opportunity.edit')->with([
            'title' => 'Edit Opportunity',
            'data' => $data
        ]);
    }

    protected function data()
    {
        return Opportunity::query()
            ->select('*')
            ->selectRaw("
                if(image is null or image = '', null,
                CONCAT('".asset('storage/opportunity')."/',
                image)) as image"
            )
            ->with(['question' => function($query){
                $query->with('answer');
            }])
            ->where('opportunity_id', $this->id)
            ->first();
    }
}
