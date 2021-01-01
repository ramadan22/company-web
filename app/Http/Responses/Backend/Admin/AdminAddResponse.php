<?php

namespace App\Http\Responses\Backend\Admin;

use App\Models\Admin;

class AdminAddResponse
{
    public function toResponse()
    {
        return view('admin.pages.admin.add')->with([
            'title' => 'Add Admin'
        ]);
    }
}
