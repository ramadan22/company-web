<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;

class BannerDeleteResponse
{
    public function toResponse($id)
    {
        Banner::where('banner_id', $id)->delete();

        return redirect('/admin/banner')
            ->with('status', 'success')
            ->with('message', 'Success Deleted Banner');
    }
}
