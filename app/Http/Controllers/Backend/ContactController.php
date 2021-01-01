<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

// response
use App\Http\Responses\Backend\Contact\ContactResponse;
use App\Http\Responses\Backend\Contact\ContactDeleteResponse;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->contactResponse = new ContactResponse;
        $this->contactDeleteResponse = new ContactDeleteResponse;
    }

    public function index()
    {
        return $this->contactResponse
            ->toResponse();
    }

    public function delete($id)
    {
        return $this->contactDeleteResponse
            ->toResponse($id);
    }
}
