<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
