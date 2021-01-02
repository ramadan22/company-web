<?php

namespace App\Http\Responses\Backend\Auth;

use App\Models\Admin;
use App\Models\LogActivity;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Responsable;

class LoginResponse implements Responsable
{
    public function toResponse($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:admin,admin_email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails())
        {
            return $this->invalid($validator->errors()->first(), $request);
        }

        return $this->check($request);
    }

    protected function check($request)
    {
        $admin = Admin::where('admin_email', $request->email)->first();

        if (!$admin) {
            return $this->invalid('No user with this email!');
        }

        if (!Hash::check($request->password, $admin->admin_password)) {
            return $this->invalid('Invalid email or password', $request);
        }

        $token = Str::uuid($admin->admin_password);
        setcookie('token', $token, time() + (86400 * 30), "/");
        setcookie('__idx', $admin->admin_id, time() + (86400 * 30), "/");

        LogActivity::log($admin->admin_id, 'Login at ' . date('H:i'), $request);

        return redirect('/admin/dashboard');
    }

    protected function invalid($message, $request)
    {
        return back()->withErrors(['msg' => $message])
            ->withInput($request->all());
    }
}
