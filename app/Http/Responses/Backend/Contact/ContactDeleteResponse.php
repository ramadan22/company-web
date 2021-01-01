<?php

namespace App\Http\Responses\Backend\Contact;

use App\Models\Contact;

class ContactDeleteResponse
{
    public function toResponse($id)
    {
        Contact::where('contact_id', $id)->delete();

        return redirect('/admin/contactus')
            ->with('status', 'success')
            ->with('message', 'Data has been deleted!');
    }
}
