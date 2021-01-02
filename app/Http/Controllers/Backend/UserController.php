<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// response
use App\Http\Responses\Backend\User\UserResponse;

class UserController extends Controller
{
    public function __construct()
    {
        $this->userResponse = new UserResponse;
    }

    public function index()
    {
        return $this->userResponse
            ->toResponse();
    }
}
