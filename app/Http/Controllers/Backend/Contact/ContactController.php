<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::get();
        return view('admin.pages.contact')->with([
            'data' => $data,
            'title' => 'Contact Us'
        ]);
    }

    public function delete($id)
    {
        Contact::where('contact_id', $id)->delete();

        return redirect('/admin/contactus')
            ->with('status', 'success')
            ->with('message', 'Data has been deleted!');
    }
}
