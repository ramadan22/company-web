<?php

namespace App\Http\Responses\Backend\OpportunityApply;

use App\Models\OpportunityApply;
use Illuminate\Contracts\Support\Responsable;

class OpportunityApplyResponse implements Responsable
{
    public function toResponse($request)
    {
        $data = OpportunityApply::query()
            ->select('*')
            ->with('opportunity')
            ->paginate(10);

        return view('admin.pages.opportunity-apply.index')->with([
            'title' => 'User Apply Opportunity',
            'data' => $data
        ]);
    }
}
