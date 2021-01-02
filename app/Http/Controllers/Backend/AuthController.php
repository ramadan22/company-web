<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// response
use App\Http\Responses\Backend\Auth\AuthResponse;
use App\Http\Responses\Backend\Auth\LoginResponse;
use App\Http\Responses\Backend\Auth\LogoutResponse;

class AuthController extends Controller
{
    public function index()
    {
        return new AuthResponse;
    }

    public function login(Request $request)
    {
        return new LoginResponse;
    }

    public function logout()
    {
        return new LogoutResponse;
    }

}
