<?php

namespace App\Http\Responses\Backend\Auth;

class LogoutResponse
{
    public function toResponse()
    {
        setcookie('token', null, "/");

        return view('admin.pages.login')->with([
            'title' => 'Login Admin'
        ]);
    }
}
