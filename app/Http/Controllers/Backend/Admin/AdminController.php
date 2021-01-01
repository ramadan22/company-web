<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $data = Admin::paginate(10);

        return view('admin.pages.admin.index')->with([
            'title' => 'Admin',
            'data' => $data
        ]);
    }

    public function add()
    {
        return view('admin.pages.admin.add')->with([
            'title' => 'Add Admin'
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:admin,admin_email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails())
        {
            return back()->withErrors(['msg' => $message])
                ->withInput($request->all());
        }
    }

    public function edit($id)
    {
        $data = Admin::where('admin_id', $id)->first();

        return view('admin.pages.admin.edit')->with([
            'title' => 'Edit Admin',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        // code...
    }

    public function delete($id)
    {
        // code...
    }
}
