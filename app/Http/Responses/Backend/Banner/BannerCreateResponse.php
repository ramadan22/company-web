<?php

namespace App\Http\Responses\Backend\Banner;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Responsable;

class BannerCreateResponse implements Responsable
{
    public function toResponse($request)
    {
        $validator = Validator::make($request->all(), [
            'banner_title' => 'required',
            'banner_description' => 'required|min:5',
            'banner_image' => 'required|file',
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
        Banner::create([
            'banner_title' => $request->banner_title,
            'banner_image' => $this->image($request->file('banner_image')),
            'banner_description' => $request->banner_description,
        ]);

        return redirect('/admin/banner')
            ->with('status', 'success')
            ->with('message', 'Success Created Banner');
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
