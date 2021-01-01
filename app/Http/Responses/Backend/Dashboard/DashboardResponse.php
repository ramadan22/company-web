<?php

namespace App\Http\Responses\Backend\Dashboard;

use Illuminate\Contracts\Support\Responsable;

class DashboardResponse implements Responsable
{
    public function toResponse($request)
    {
        return view("admin.pages.dashboard.index")->with([
            'title' => 'Dashboard'
        ]);
    }
}
