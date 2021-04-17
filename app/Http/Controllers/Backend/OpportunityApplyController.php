<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\OpportunityAttachment;

// responses
use App\Http\Responses\Backend\OpportunityApply\OpportunityApplyResponse;
use App\Http\Responses\Backend\OpportunityApply\OpportunityApplyDetailResponse;

class OpportunityApplyController extends Controller
{
    public function index()
    {
        return new OpportunityApplyResponse;
    }

    public function detail($id)
    {
        return new OpportunityApplyDetailResponse($id);
    }

    public function download($id)
    {
        $document = OpportunityAttachment::where('opportunity_attachment_id', $id)->first();
        return Storage::disk('public')->download("document/". $document->file);
    }
}
