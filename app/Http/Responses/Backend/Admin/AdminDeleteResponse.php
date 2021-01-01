<?php

namespace App\Http\Responses\Backend\Admin;

use App\Models\Admin;

class AdminDeleteResponse
{
    public function toResponse($id)
    {
        Admin::where('admin_id', $id)->delete();

        return redirect('/admin/admin')
            ->with('status', 'success')
            ->with('message', 'Success Deleted Admin');
    }
}
