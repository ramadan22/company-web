<?php

namespace App\Http\Responses\Backend\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminCreateResponse
{
    public function toResponse($request)
    {
        $validator = Validator::make($request->all(), [
            'admin_name' => 'required',
            'admin_email' => 'required|email|unique:admin',
            'admin_password' => 'required|min:6',
            'admin_address' => 'required',
            'admin_photo' => 'required|file',
            'admin_description' => 'required|min:10',
        ]);

        if ($validator->fails())
        {
            return back()->withErrors(['msg' => $validator->errors()->first()])
                ->withInput($request->all());
        }

        return $this->save($request);
    }

    protected function save($request)
    {
        Admin::create([
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_photo' => $this->photo($request->file('admin_photo')),
            'admin_description' => $request->admin_description,
            'admin_password' => Hash::make($request->admin_password),
            'admin_address' => $request->admin_address
        ]);

        return redirect('/admin/admin')
            ->with('status', 'success')
            ->with('message', 'Success Created Admin');
    }

    protected function photo($request)
    {
        $filename = '';
        if (!empty($file)) {
            $filename   = time().'.'.$file->getClientOriginalExtension();
            $image      = file_get_contents($file->getPathName());
            Storage::disk('public')->put("admin/profile/".$filename, $image);
        }

        return $filename;
    }
}
