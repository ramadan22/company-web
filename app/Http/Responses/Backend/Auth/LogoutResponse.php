<?php

namespace App\Http\Responses\Backend\Auth;

use Illuminate\Contracts\Support\Responsable;

class LogoutResponse implements Responsable
{
    public function toResponse($request)
    {
        setcookie('token', null, "/");

        return view('admin.pages.login')->with([
            'title' => 'Login Admin'
        ]);
    }
}
