<?php

namespace App\Http\Responses\Backend\OpportunityApply;

use App\Models\OpportunityApply;
use App\Models\OpportunityAttachment;
use Illuminate\Contracts\Support\Responsable;

class OpportunityApplyDetailResponse implements Responsable
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $data = OpportunityApply::query()
            ->select('*')
            ->with('opportunity')
            ->where('opportunity_apply_id', $this->id)
            ->first();

        $data->attachment = OpportunityAttachment::query()
            ->where('opportunity_id', $data->opportunity->opportunity_id)
            ->where('email', $data->email)
            ->get();

        return view('admin.pages.opportunity-apply.detail')->with([
            'title' => 'User Apply Opportunity Detail',
            'data' => $data
        ]);
    }
}
