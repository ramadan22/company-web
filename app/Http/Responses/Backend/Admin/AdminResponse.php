<?php

namespace App\Http\Responses\Backend\Admin;

use App\Models\Admin;
use Illuminate\Contracts\Support\Responsable;

class AdminResponse implements Responsable
{
    public function toResponse($request)
    {
        $data = Admin::paginate(10);

        return view('admin.pages.admin.index')->with([
            'title' => 'Admin',
            'data' => $data
        ]);
    }
}
