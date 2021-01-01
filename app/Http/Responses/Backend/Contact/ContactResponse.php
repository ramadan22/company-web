<?php

namespace App\Http\Responses\Backend\Contact;

use App\Models\Contact;

class ContactResponse
{
    public function toResponse()
    {
        $data = Contact::get();

        return view('admin.pages.contact.index')->with([
            'data' => $data,
            'title' => 'Contact Us'
        ]);
    }
}
