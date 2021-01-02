<?php

namespace App\Http\Responses\Backend\Opportunity;

use App\Models\Opportunity;
use Illuminate\Contracts\Support\Responsable;

class OpportunityResponse implements Responsable
{
    public function toResponse($request)
    {
        $data = Opportunity::query()
            ->select('*')
            ->selectRaw('substring(description, 1, 40) as description')
            ->paginate(10);

        return view('admin.pages.opportunity.index')->with([
            'title' => 'Opportunity',
            'data' => $data
        ]);
    }
}
