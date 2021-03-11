<?php

namespace App\Http\Responses\Frontend\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Responsable;

class ContactCreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            $validate = $this->validate($request);

            if(!$validate) {
                return back()
                    ->with('status', 'failed')
                    ->with('message', $validate->message);
            }

            $data = $this->data($request);

            return back()
                ->with('status', 'success')
                ->with('message', 'Your message has been sent!');

        } catch (\Exception $e) {
            return back()
                ->with('status', 'failed')
                ->with('message', 'Your message not sent!');
        }
    }

    protected function validate($request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:500',
        ]);

        if ($validator->fails()) {
            return (object) [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        return (object) [
            'status' => true
        ];
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
