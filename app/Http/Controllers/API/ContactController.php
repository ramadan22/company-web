<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

// response
use App\Http\Responses\API\Contact\ContactResponse;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'message' => $validator->errors()->first(),
                'data' => new \stdClass
            ], 200);
        }

        return new ContactResponse;
    }
}
