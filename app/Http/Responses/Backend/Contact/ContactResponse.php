<?php

namespace App\Http\Responses\Backend\Contact;

use App\Models\Contact;
use Illuminate\Contracts\Support\Responsable;

class ContactResponse implements Responsable
{
    public function toResponse($request)
    {
        $data = Contact::get();

        return view('admin.pages.contact.index')->with([
            'data' => $data,
            'title' => 'Contact Us'
        ]);
    }
}
