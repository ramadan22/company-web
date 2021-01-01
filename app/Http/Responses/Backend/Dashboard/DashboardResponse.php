<?php

namespace App\Http\Responses\Backend\Dashboard;

class DashboardResponse
{
    public function toResponse()
    {
        return view("admin.pages.dashboard.index")->with([
            'title' => 'Dashboard'
        ]);
    }
}
