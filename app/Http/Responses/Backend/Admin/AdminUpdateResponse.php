<?php

namespace App\Http\Responses\Backend\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Responsable;

class AdminUpdateResponse implements Responsable
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $validator = Validator::make($request->all(), [
            'admin_name' => 'required',
            'admin_email' => 'required|email|unique:admin,admin_email,' . $this->id . ',admin_id',
            'admin_password' => 'min:6|nullable',
            'admin_address' => 'required',
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
        $admin = Admin::where('admin_id', $this->id)->first();
        $admin->update([
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_photo' => !empty($request->admin_phot) ? $this->photo($request->file('admin_photo')) : $admin->admin_photo,
            'admin_description' => $request->admin_description,
            'admin_password' => !empty($request->admin_password) ? Hash::make($request->admin_password) : $admin->admin_password,
            'admin_address' => $request->admin_address
        ]);

        return redirect('/admin/admin')
            ->with('status', 'success')
            ->with('message', 'Success Updated Admin');
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
