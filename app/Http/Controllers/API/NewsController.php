<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

// response
use App\Http\Responses\API\News\NewsResponse;
use App\Http\Responses\API\News\NewsDetailResponse;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        return new NewsResponse;
    }

    protected function detail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'news_id' => 'required|exists:news',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'message' => $validator->errors()->first(),
                'data' => new \stdClass
            ], 200);
        }

        return new NewsDetailResponse;
    }
}
