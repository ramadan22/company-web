<?php

namespace App\Http\Responses\Backend\Admin;

use App\Models\Admin;

class AdminEditResponse
{
    public function toResponse($id)
    {
        $data = Admin::where('admin_id', $id)->first();

        return view('admin.pages.admin.edit')->with([
            'title' => 'Edit Admin',
            'data' => $data
        ]);
    }
}
