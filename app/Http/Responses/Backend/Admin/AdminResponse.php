<?php

namespace App\Http\Responses\Backend\Admin;

use App\Models\Admin;

class AdminResponse
{
    public function toResponse()
    {
        $data = Admin::paginate(10);

        return view('admin.pages.admin.index')->with([
            'title' => 'Admin',
            'data' => $data
        ]);
    }
}
