<?php

namespace App\Http\Responses\API\Banner;

use App\Models\Banner;
use Illuminate\Contracts\Support\Responsable;

class BannerResponse implements Responsable
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
        return Banner::query()
            ->select('banner_title', 'banner_id', 'banner_description')
            ->selectRaw("
                if(banner_image is null or banner_image = '', null,
                CONCAT('".asset('storage/banner')."/',
                banner_image)) as banner_image"
            )
            ->paginate(10);
    }
}
