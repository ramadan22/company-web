<?php

namespace App\Http\Responses\API\About;

use App\Models\About;
use Illuminate\Contracts\Support\Responsable;

class AboutResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            $data = $this->data();

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

    protected function data()
    {
        return About::query()
            ->select('about_content')
            ->first();
    }
}
