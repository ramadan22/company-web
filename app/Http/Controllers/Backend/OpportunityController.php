<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// responses
use App\Http\Responses\Backend\Opportunity\OpportunityResponse;
use App\Http\Responses\Backend\Opportunity\OpportunityAddResponse;
use App\Http\Responses\Backend\Opportunity\OpportunityCreateResponse;
use App\Http\Responses\Backend\Opportunity\OpportunityEditResponse;
use App\Http\Responses\Backend\Opportunity\OpportunityUpdateResponse;
use App\Http\Responses\Backend\Opportunity\OpportunityDeleteResponse;

class OpportunityController extends Controller
{
    public function index()
    {
        return new OpportunityResponse;
    }

    public function add()
    {
        return new OpportunityAddResponse;
    }

    public function create(Request $request)
    {
        return new OpportunityCreateResponse;
    }

    public function edit($id)
    {
        return new OpportunityEditResponse($id);
    }

    public function update(Request $request, $id)
    {
        return new OpportunityUpdateResponse($id);

    }

    public function delete($id)
    {
        return new OpportunityDeleteResponse($id);
    }
}
