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
    public function __construct()
    {
        $this->adminResponse = new AdminResponse;
        $this->adminAddResponse = new AdminAddResponse;
        $this->adminCreateResponse = new AdminCreateResponse;
        $this->adminEditResponse = new AdminEditResponse;
        $this->adminUpdateResponse = new AdminUpdateResponse;
        $this->adminDeleteResponse = new AdminDeleteResponse;
    }

    public function index()
    {
        return $this->adminResponse
            ->toResponse();
    }

    public function add()
    {
        return $this->adminAddResponse
            ->toResponse();
    }

    public function create(Request $request)
    {
        return $this->adminCreateResponse
            ->toResponse($request);
    }

    public function edit($id)
    {
        return $this->adminEditResponse
            ->toResponse($id);
    }

    public function update(Request $request, $id)
    {
        return $this->adminUpdateResponse
            ->toResponse($request, $id);

    }

    public function delete($id)
    {
        return $this->adminDeleteResponse
            ->toResponse($id);
    }
}
