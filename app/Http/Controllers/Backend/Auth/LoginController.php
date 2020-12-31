<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Responses\Backend\Auth\KoginResponse;

class LoginController extends Controller
{

    public function index(Request $request)
    {
        return view('admin.pages.login')->with([
            'title' => 'Login Admin'
        ]);
    }

    public function login(Request $request)
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

        return redirect('/admin/aboutus');
    }

    protected function invalid($message, $request)
    {
        return back()->withErrors(['msg' => $message])
            ->withInput($request->all());
    }

}
