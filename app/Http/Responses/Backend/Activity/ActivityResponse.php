<?php

namespace App\Http\Responses\Backend\Activity;

use App\Models\LogActivity;
use Illuminate\Contracts\Support\Responsable;

class ActivityResponse implements Responsable
{
    public function toResponse($request)
    {
        $about = LogActivity::query()
            ->select('log_activity.*', 'admin.admin_name')
            ->leftJoin('admin', 'admin.admin_id', '=', 'log_activity.user_id')
            ->paginate(10);

        return view("admin.pages.activity.index")->with([
            'data' => $about,
            'title' => 'Admin Activity'
        ]);
    }
}
