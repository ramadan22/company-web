<?php

namespace App\Http\Responses\API\Opportunity;

use App\Models\Answer;
use Illuminate\Contracts\Support\Responsable;

class RemoveAnswerResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            $data = $this->proccess($request);

            return response()->json([
                'code' => 200,
                'message' => 'Ok',
                'data' => new \stdClass
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage(),
                'data' => []
            ], 200);
        }
    }

    protected function proccess($request)
    {
        return Answer::query()
            ->where('answer_id', $request->answer_id)
            ->delete();
    }
}
