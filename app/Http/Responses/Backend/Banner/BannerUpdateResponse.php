<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;
use App\Models\LogActivity;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Responsable;

class BannerUpdateResponse implements Responsable
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $validator = Validator::make($request->all(), [
            'banner_title' => 'required',
            'banner_description' => 'required|min:5',
        ]);

        if ($validator->fails())
        {
            return back()->withErrors(['msg' => $validator->errors()->first()])
                ->withInput($request->all());
        }

        return $this->save($request);
    }

    protected function save($request)
    {
        $banner = Banner::where('banner_id', $this->id)->first();

        LogActivity::log($_COOKIE['__idx'], 'Change Data Banner At ' . date('H:i'), $request);

        $banner->update([
            'banner_title' => $request->banner_title,
            'banner_image' => (!empty($request->banner_image)) ? $this->image($request->file('banner_image')) : $banner->banner_image,
            'banner_description' => $request->banner_description,
        ]);

        return redirect('/admin/banner')
            ->with('status', 'success')
            ->with('message', 'Success Updated Banner');
    }

    protected function image($file)
    {
        $filename = '';
        if (!empty($file)) {
            $filename   = time().'.'.$file->getClientOriginalExtension();
            $image      = file_get_contents($file->getPathName());
            Storage::disk('public')->put("banner/".$filename, $image);
        }

        return $filename;
    }
}
