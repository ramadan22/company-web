<?php

namespace App\Http\Responses\Backend\Admin;

use App\Models\Admin;
use App\Models\LogActivity;
use Illuminate\Contracts\Support\Responsable;

class AdminDeleteResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        Admin::where('admin_id', $this->id)->delete();

        LogActivity::log($_COOKIE['__idx'], 'Change Data Admin At ' . date('H:i'), $request);

        return redirect('/admin/admin')
            ->with('status', 'success')
            ->with('message', 'Success Deleted Admin');
    }
}
