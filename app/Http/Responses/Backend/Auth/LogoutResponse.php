<?php

namespace App\Http\Responses\Backend\Auth;

use App\Models\LogActivity;
use Illuminate\Contracts\Support\Responsable;

class LogoutResponse implements Responsable
{
    public function toResponse($request)
    {
        LogActivity::log($_COOKIE['__idx'], 'Logout at ' . date('H:i'), $request);

        setcookie('token', null, "/");
        setcookie('__idx', null, "/");

        return view('admin.pages.auth.login')->with([
            'title' => 'Login Admin'
        ]);
    }
}
