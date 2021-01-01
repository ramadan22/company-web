<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// response
use App\Http\Responses\Backend\Auth\AuthResponse;
use App\Http\Responses\Backend\Auth\LoginResponse;
use App\Http\Responses\Backend\Auth\LogoutResponse;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->authResponse = new AuthResponse;
        $this->loginResponse = new LoginResponse;
        $this->logoutResponse = new LogoutResponse;
    }

    public function index()
    {
        return $this->authResponse
            ->toResponse();
    }

    public function login(Request $request)
    {
        return $this->loginResponse
            ->toResponse($request);
    }

    public function logout()
    {
        return $this->logoutResponse
            ->toResponse();
    }

}
