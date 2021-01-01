<?php

namespace App\Http\Responses\Backend\Contact;

use App\Models\Contact;
use Illuminate\Contracts\Support\Responsable;

class ContactDeleteResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        Contact::where('contact_id', $this->id)->delete();

        return redirect('/admin/contactus')
            ->with('status', 'success')
            ->with('message', 'Data has been deleted!');
    }
}
