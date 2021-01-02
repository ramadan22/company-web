<?php

namespace App\Http\Responses\Backend\Contact;

use App\Models\Contact;
use App\Models\LogActivity;
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

        LogActivity::log($_COOKIE['__idx'], 'Delete Data Contact Us At ' . date('H:i'), $request);

        return redirect('/admin/contactus')
            ->with('status', 'success')
            ->with('message', 'Data has been deleted!');
    }
}
