<?php

namespace App\Http\Responses\Backend\Opportunity;

use App\Models\Opportunity;
use Illuminate\Contracts\Support\Responsable;

class OpportunityAddResponse implements Responsable
{
    public function toResponse($request)
    {
        return view('admin.pages.opportunity.add')->with([
            'title' => 'Add Opportunity'
        ]);
    }
}
