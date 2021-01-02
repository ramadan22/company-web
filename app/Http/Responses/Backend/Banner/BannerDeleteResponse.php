<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;
use App\Models\LogActivity;
use Illuminate\Contracts\Support\Responsable;

class BannerDeleteResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        Banner::where('banner_id', $this->id)->delete();

        LogActivity::log($_COOKIE['__idx'], 'Delete Data Banner At ' . date('H:i'), $request);

        return redirect('/admin/banner')
            ->with('status', 'success')
            ->with('message', 'Success Deleted Banner');
    }
}
