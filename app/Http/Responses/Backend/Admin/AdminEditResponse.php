<?php

namespace App\Http\Responses\Backend\Admin;

use App\Models\Admin;
use Illuminate\Contracts\Support\Responsable;

class AdminEditResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $data = Admin::where('admin_id', $this->id)->firstOrFail();

        return view('admin.pages.admin.edit')->with([
            'title' => 'Edit Admin',
            'data' => $data
        ]);
    }
}
