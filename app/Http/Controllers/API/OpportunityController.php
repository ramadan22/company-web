<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

// response
use App\Http\Responses\API\Opportunity\RemoveAnswerResponse;

class OpportunityController extends Controller
{
    public function removeAnswer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'answer_id' => 'required|exists:answer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'message' => $validator->errors()->first(),
                'data' => new \stdClass
            ], 200);
        }

        return new RemoveAnswerResponse;
    }
}
