<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;
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

        return redirect('/admin/banner')
            ->with('status', 'success')
            ->with('message', 'Success Deleted Banner');
    }
}
