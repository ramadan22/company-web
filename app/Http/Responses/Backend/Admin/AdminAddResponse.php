<?php

namespace App\Http\Responses\Backend\Admin;

use App\Models\Admin;
use Illuminate\Contracts\Support\Responsable;

class AdminAddResponse implements Responsable
{
    public function toResponse($request)
    {
        return view('admin.pages.admin.add')->with([
            'title' => 'Add Admin'
        ]);
    }
}
