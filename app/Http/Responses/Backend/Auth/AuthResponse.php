<?php

namespace App\Http\Responses\Backend\Auth;

class AuthResponse
{
    public function toResponse()
    {
        return view('admin.pages.login')->with([
            'title' => 'Login Admin'
        ]);
    }
}
