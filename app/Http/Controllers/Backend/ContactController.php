<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

// response
use App\Http\Responses\Backend\Contact\ContactResponse;
use App\Http\Responses\Backend\Contact\ContactDeleteResponse;

class ContactController extends Controller
{
    public function index()
    {
        return new ContactResponse;
    }

    public function delete($id)
    {
        return new ContactDeleteResponse($id);
    }
}
