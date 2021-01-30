<?php

namespace App\Http\Responses\API\News;

use App\Models\News;
use Illuminate\Contracts\Support\Responsable;

class NewsDetailResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            $data = $this->data($request);

            if ($data) {
                return response()->json([
                    'code' => 200,
                    'message' => 'Ok',
                    'data' => $data
                ], 200);
            }else{
                return response()->json([
                    'code' => 204,
                    'message' => 'No Content',
                    'data' => new \stdClass
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage(),
                'data' => new \stdClass
            ], 200);
        }
    }

    protected function data($request)
    {
        return News::query()
            ->select('news_id', 'news_title', 'news_content')
            ->selectRaw("
                if(news_image is null or news_image = '', null,
                CONCAT('".asset('storage/news/thumbnail')."/',
                news_image)) as news_image"
            )
            ->where('news_id', $request->news_id)
            ->first();
    }
}
