<?php

namespace App\Http\Responses\Frontend\Contact;

use App\Models\Contact;
use Illuminate\Contracts\Support\Responsable;

class ContactResponse implements Responsable
{
    public function toResponse($request)
    {
        return view('web.pages.ContactUsView')->with([
            'title' => 'Contact Us'
        ]);
    }
}
