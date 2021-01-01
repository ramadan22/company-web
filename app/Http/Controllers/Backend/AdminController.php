<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// responses
use App\Http\Responses\Backend\Admin\AdminResponse;
use App\Http\Responses\Backend\Admin\AdminAddResponse;
use App\Http\Responses\Backend\Admin\AdminCreateResponse;
use App\Http\Responses\Backend\Admin\AdminEditResponse;
use App\Http\Responses\Backend\Admin\AdminUpdateResponse;
use App\Http\Responses\Backend\Admin\AdminDeleteResponse;

class AdminController extends Controller
{
    public function index()
    {
        return new AdminResponse;
    }

    public function add()
    {
        return new AdminAddResponse;
    }

    public function create(Request $request)
    {
        return new AdminCreateResponse;
    }

    public function edit($id)
    {
        return new AdminEditResponse($id);
    }

    public function update(Request $request, $id)
    {
        return new AdminUpdateResponse($id);

    }

    public function delete($id)
    {
        return new AdminDeleteResponse($id);
    }
}
