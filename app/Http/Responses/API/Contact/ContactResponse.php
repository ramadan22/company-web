<?php

namespace App\Http\Responses\API\Contact;

use App\Models\Contact;
use Illuminate\Contracts\Support\Responsable;

class ContactResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            $data = $this->data($request);

            return response()->json([
                'code' => 200,
                'message' => 'Ok',
                'data' => new \stdClass
            ]);
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
        return Contact::create([
            'contact_message' => $request->message,
            'contact_email' => $request->email,
            'contact_subject' => $request->subject,
        ]);
    }
}
