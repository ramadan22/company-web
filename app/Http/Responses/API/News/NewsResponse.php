<?php

namespace App\Http\Responses\API\News;

use App\Models\News;
use Illuminate\Contracts\Support\Responsable;

class NewsResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            $data = $this->data($request);

            if (!$data->isEmpty()) {
                return response()->json([
                    'code' => 200,
                    'message' => 'Ok',
                    'data' => $data
                ], 200);
            }else{
                return response()->json([
                    'code' => 204,
                    'message' => 'No Content',
                    'data' => []
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage(),
                'data' => []
            ], 200);
        }
    }

    protected function data($request)
    {
        return News::query()
            ->select('news_id', 'news_title')
            ->selectRaw('substring(news_content, 1, 200) as news_content')
            ->selectRaw("
                if(news_image is null or news_image = '', null,
                CONCAT('".asset('storage/news/thumbnail')."/',
                news_image)) as news_image"
            )
            ->paginate(10);
    }
}
