<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Responses\Frontend\Contact\ContactResponse;
use App\Http\Responses\Frontend\Contact\ContactCreateResponse;

class ContactUsController extends Controller
{
    public function index()
    {
        return new ContactResponse;
    }

    public function create(Request $request)
    {
        return new ContactCreateResponse;
    }
}
