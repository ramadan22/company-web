<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;
use Illuminate\Contracts\Support\Responsable;

class BannerEditResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $data = Banner::where('banner_id', $this->id)->firstOrFail();

        return view('admin.pages.banner.edit')->with([
            'title' => 'Edit Data Banner',
            'data' => $data
        ]);
    }
}
