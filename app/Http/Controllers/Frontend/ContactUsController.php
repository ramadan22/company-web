<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __invoke()
    {
        // return view("index");
        return view("web.page.ContactUsView")->with([
            'title' => 'Contact Us',
            'view' => 'ContactUsView'
        ]);
    }
}
