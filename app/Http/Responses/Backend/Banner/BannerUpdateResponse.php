<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerUpdateResponse
{
    public function toResponse($request, $id)
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

        return $this->save($request, $id);
    }

    protected function save($request, $id)
    {
        $banner = Banner::where('banner_id', $id)->first();

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
