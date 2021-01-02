<?php

namespace App\Http\Responses\Backend\Auth;

use Illuminate\Contracts\Support\Responsable;

class AuthResponse implements Responsable
{
    public function toResponse($request)
    {
        return view('admin.pages.auth.login')->with([
            'title' => 'Login Admin'
        ]);
    }
}
